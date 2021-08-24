<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use JaguarJack\MigrateGenerator\MigrateGenerator;
use JaguarJack\MigrateGenerator\Migration\LaravelMigrationForeignKeys;

class GenerateInsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migration:generate_insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate migration files if you never use';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $migrateGenerator = (new MigrateGenerator('laravel'));

        $tables = $migrateGenerator->getDatabase()->getAllTables();

        $tables_name = [];
        foreach ($tables as $key => $table) {
            //迁移表会自己创建,跳过
            if ($table->getName()==='migrations') continue;

            $table_name = date('Y_m_d_His') . '_' . $table->getName(). '.php';
            file_put_contents(database_path( 'migrations/')  . $table_name , $migrateGenerator->getMigrationContent($table));
            $tables_name[] = array(
                'migration' => $table_name,
                'batch' => $key+1,
            );
            $this->info(sprintf('%s table migration file generated', $table->getName()));
        }

        //直接写入迁移数据,防止重复迁移
        DB::table('migrations')->truncate();
        DB::table('migrations')->insert($tables_name);

        $this->foreignKeys($tables, database_path( 'migrations/'));
    }

    protected function foreignKeys($tables, $migrationsPath)
    {
        foreach ($tables as $key => $table) {
            $tableForeign = (new LaravelMigrationForeignKeys())->setTable($table);
            if ($tableForeign->hasForeignKeys()) {
                file_put_contents($migrationsPath . date('Y_m_d_His') . '_' . $table->getName() . '_foreign_keys.php',
                    $tableForeign->output());
            }
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Backend\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Permission;

class NodeRepair extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'node_repair';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '修复系统中树形结构节点';

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
		$this->comment('修复权限节点');
	    Permission::fixTree();

	    $this->comment('修复角色节点');
	    Role::fixTree();

		$this->info('树形结构节点修复完成!');
		return true;
    }


}

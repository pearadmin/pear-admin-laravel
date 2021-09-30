<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use App\Models\Backend\Config;
use Illuminate\Console\Command;
use App\Models\Backend\Permission;
use App\Models\Backend\ConfigGroup;

class InitSendDataFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init_send_data_files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化数据库数据文件';

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
        $this->info('开始写入初始化文件');
        $base_path = public_path('static/insert/');
        $user_data_file_name = $base_path.'users.json';
        $role_data_file_name = $base_path.'roles.json';
        $permission_data_file_name = $base_path.'permissions.json';
        $config_data_file_name = $base_path.'configure.json';
        $category_data_file_name = $base_path.'categories.json';
        if (self::writeUsersFile($user_data_file_name)){
            $this->info('user data written successfully;file:'.$user_data_file_name);
        }
        if (self::writeRolesFile($role_data_file_name)){
            $this->info('role data written successfully;file:'.$role_data_file_name);
        }
        if (self::writePermissionsFile($permission_data_file_name)){
            $this->info('permission data written successfully;file:'.$permission_data_file_name);
        }
        if (self::writeConfigsFile($config_data_file_name)){
            $this->info('config data written successfully;file:'.$config_data_file_name);
        }
        if (self::writeCategoriesFile($category_data_file_name)){
            $this->info('category data written successfully;file:'.$category_data_file_name);
        }

        $this->info('初始化文件写入完成');
        exit();
    }

    /**
     * 初始化用户数据
     * @author: hongbinwang
     * @time  : 2021/8/9 17:08
     */
    protected static function writeUsersFile($filename)
    {
        $data = [
            'username' => 'admin',
            'phone' => '19995552244',
            'nickname' => '超级管理员',
            'email' => 'admin@163.com',
            'password' => 'password',
            'api_token' => hash('sha256', Str::random(60)),
        ];
        file_put_contents($filename,json_encode($data,JSON_UNESCAPED_UNICODE));
        return file_exists($filename);
    }

    /**
     * 初始化角色数据
     * @author: hongbinwang
     * @time  : 2021/8/9 17:08
     */
    protected static function writeRolesFile($filename)
    {
        $data = [
            'name' => 'root',
            'guard_name' => 'web',
            'display_name' => '超级管理员',
            'sort' => 999
        ];
        file_put_contents($filename,json_encode($data,JSON_UNESCAPED_UNICODE));
        return file_exists($filename);
    }

    /**
     * 初始化权限数据
     * @author: hongbinwang
     * @time  : 2021/8/9 17:08
     */
    protected static function writePermissionsFile($filename)
    {
        $data = [
            [
                "name" =>"dashboard",
                "guard_name" =>"web",
                "display_name" =>"控制中心",
                "route" =>"",
                "icon" =>"layui-icon-console",
                "sort" =>0,
                "type" =>10,
                "children" =>[
                    [
                        "name" =>"dashboard.datacenter",
                        "guard_name" =>"web",
                        "display_name" =>"控制中心",
                        "route" =>"admin.datacenter",
                        "icon" =>"layui-icon-console",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[]
                    ],
                    [
                        "name" =>"dashboard.message",
                        "guard_name" =>"web",
                        "display_name" =>"留言管理",
                        "route" =>"admin.message",
                        "icon" =>"layui-icon-list",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[]
                    ]
                ]
            ],
            [
                "name" =>"information",
                "guard_name" =>"web",
                "display_name" =>"资讯管理",
                "route" =>"",
                "icon" =>"layui-icon-read",
                "sort" =>0,
                "type" =>10,
                "children" =>[
                    [
                        "name" =>"information.article",
                        "guard_name" =>"web",
                        "display_name" =>"文章管理",
                        "route" =>"admin.article",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"information.article.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加文章",
                                "route" =>"admin.article.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"information.article.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑文章",
                                "route" =>"admin.article.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"information.article.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除文章",
                                "route" =>"admin.article.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ],
                    [
                        "name" =>"information.category",
                        "guard_name" =>"web",
                        "display_name" =>"分类管理",
                        "route" =>"admin.category",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"information.category.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加分类",
                                "route" =>"admin.category.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"information.category.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑分类",
                                "route" =>"admin.category.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"information.category.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除分类",
                                "route" =>"admin.category.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ],
                    [
                        "name" =>"information.tag",
                        "guard_name" =>"web",
                        "display_name" =>"标签管理",
                        "route" =>"admin.tag",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"information.tag.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加标签",
                                "route" =>"admin.tag.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"information.tag.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑标签",
                                "route" =>"admin.tag.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"information.tag.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除标签",
                                "route" =>"admin.tag.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ]
                ]
            ],
            [
                "name" =>"system",
                "guard_name" =>"web",
                "display_name" =>"系统管理",
                "route" =>"",
                "icon" =>"layui-icon-set",
                "sort" =>0,
                "type" =>10,
                "children" =>[
                    [
                        "name" =>"system.permission",
                        "guard_name" =>"web",
                        "display_name" =>"权限管理",
                        "route" =>"admin.permission",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"system.permission.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加权限",
                                "route" =>"admin.permission.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.permission.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑权限",
                                "route" =>"admin.permission.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.permission.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除权限",
                                "route" =>"admin.permission.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ],
                    [
                        "name" =>"system.role",
                        "guard_name" =>"web",
                        "display_name" =>"角色管理",
                        "route" =>"admin.role",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"system.role.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加角色",
                                "route" =>"admin.role.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.role.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑角色",
                                "route" =>"admin.role.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.role.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除角色",
                                "route" =>"admin.role.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.role.permission",
                                "guard_name" =>"web",
                                "display_name" =>"分配权限",
                                "route" =>"admin.role.permission",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ],
                    [
                        "name" =>"system.user",
                        "guard_name" =>"web",
                        "display_name" =>"管理员管理",
                        "route" =>"admin.user",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"system.user.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加用户",
                                "route" =>"admin.user.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.user.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑用户",
                                "route" =>"admin.user.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.user.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除用户",
                                "route" =>"admin.user.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.user.role",
                                "guard_name" =>"web",
                                "display_name" =>"分配角色",
                                "route" =>"admin.user.role",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.user.permission",
                                "guard_name" =>"web",
                                "display_name" =>"分配权限",
                                "route" =>"admin.user.permission",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ],
                    [
                        "name" =>"system.dictionary",
                        "guard_name" =>"web",
                        "display_name" =>"字典管理",
                        "route" =>"admin.dictionary",
                        "icon" =>"layui-icon-face-smile-fine",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"system.dictionary.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加字典",
                                "route" =>"admin.dictionary.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.dictionary.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑字典",
                                "route" =>"admin.dictionary.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.dictionary.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除字典",
                                "route" =>"admin.dictionary.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ],
                    [
                        "name" =>"system.log",
                        "guard_name" =>"web",
                        "display_name" =>"行为日志",
                        "route" =>"admin.log",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"system.login_log.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除登录日志",
                                "route" =>"admin.login_log.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"system.operate_log.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除操作日志",
                                "route" =>"admin.operate_log.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ]
                ]
            ],
            [
                "name" =>"configuration",
                "guard_name" =>"web",
                "display_name" =>"系统配置",
                "route" =>"",
                "icon" =>"layui-icon-component",
                "sort" =>0,
                "type" =>10,
                "children" =>[
                    [
                        "name" =>"configuration.config_group",
                        "guard_name" =>"web",
                        "display_name" =>"配置组",
                        "route" =>"admin.config_group",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"configuration.config_group.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加组",
                                "route" =>"admin.config_group.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"configuration.config_group.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑组",
                                "route" =>"admin.config_group.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"configuration.config_group.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除组",
                                "route" =>"admin.config_group.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ],
                    [
                        "name" =>"configuration.config_be",
                        "guard_name" =>"web",
                        "display_name" =>"系统配置",
                        "route" =>"admin.config.be",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[
                            [
                                "name" =>"configuration.config.create",
                                "guard_name" =>"web",
                                "display_name" =>"添加组",
                                "route" =>"admin.config.create",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"configuration.config.edit",
                                "guard_name" =>"web",
                                "display_name" =>"编辑组",
                                "route" =>"admin.config.edit",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ],
                            [
                                "name" =>"configuration.config.destroy",
                                "guard_name" =>"web",
                                "display_name" =>"删除组",
                                "route" =>"admin.config.destroy",
                                "icon" =>"layui-icon-circle",
                                "sort" =>0,
                                "type" =>20
                            ]
                        ]
                    ],
                    [
                        "name" =>"configuration.config_fe",
                        "guard_name" =>"web",
                        "display_name" =>"前端配置",
                        "route" =>"admin.config.fe",
                        "icon" =>"layui-icon-circle",
                        "sort" =>0,
                        "type" =>20,
                        "children" =>[]
                    ]
                ]
            ]
        ];
        file_put_contents($filename,json_encode($data,JSON_UNESCAPED_UNICODE));
        return file_exists($filename);
    }

    /**
     * 初始化配置数据
     * @author: hongbinwang
     * @time  : 2021/8/9 17:09
     */
    protected static function writeConfigsFile($filename)
    {
        /*$config_groups = ConfigGroup::with(['configs'])->orderBy('sort','asc')->get()->toArray();
        $data = [];
        foreach ($config_groups as $i => $group) {
            $conf = [];
            if (isset($group['configs']) && count($group['configs'])>0){
                foreach ($group['configs'] as $j => $config) {
                    $conf[] = [
                        'label' => $config['label'],
                        'key' => $config['key'],
                        'val' => $config['val'],
                        'type' => $config['type'],
                        'content' => $config['content']??'',
                        'tips' => $config['tips']??'',
                        'sort' => $config['sort'],
                    ];
                }
            }
            $data[] = [
                'name' => $group['name'],
                'sort' => $group['sort'],
                'local' => $group['local'],
                'config' => $conf
            ];
        }*/
        $data = [
            [
                "name" =>"系统配置",
                "sort" =>1,
                "local" =>"backend",
                "config" =>[
                    [
                        "label" =>"登录日志",
                        "key" =>"login_log",
                        "val" =>"1",
                        "type" =>"radio",
                        "content" =>"0:关闭|1:开启",
                        "tips" =>"开启后将记录后台登录日志",
                        "sort" =>10
                    ],
                    [
                        "label" =>"删除登录日志",
                        "key" =>"delete_login_log",
                        "val" =>"1",
                        "type" =>"radio",
                        "content" =>"0:禁止|1:允许",
                        "tips" =>"开启后将允许后台删除登录日志",
                        "sort" =>10
                    ],
                    [
                        "label" =>"操作日志",
                        "key" =>"operate_log",
                        "val" =>"1",
                        "type" =>"radio",
                        "content" =>"0:关闭|1:开启",
                        "tips" =>"开启后将记录后台操作日志",
                        "sort" =>10
                    ],
                    [
                        "label" =>"删除操作日志",
                        "key" =>"delete_operate_log",
                        "val" =>"1",
                        "type" =>"radio",
                        "content" =>"0:禁止|1:允许",
                        "tips" =>"开启后将允许后台删除操作日志",
                        "sort" =>10
                    ]
                ]
            ],
            [
                "name" =>"站点配置",
                "sort" =>2,
                "local" =>"backend",
                "config" =>[
                    [
                        "label" =>"站点标题",
                        "key" =>"site_title",
                        "val" =>"HB Admin 管理系统",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"关键词",
                        "key" =>"site_keywords",
                        "val" =>"后台管理系统管理",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"描述",
                        "key" =>"site_description",
                        "val" =>"HB Admin后台管理系统管理",
                        "type" =>"textarea",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ]
                ]
            ],
            [
                "name" =>"邮件配置",
                "sort" =>3,
                "local" =>"backend",
                "config" =>[
                    [
                        "label" =>"邮件引擎",
                        "key" =>"mail_host",
                        "val" =>"xx",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"eg:smtp.mailtrap.io",
                        "sort" =>10
                    ],
                    [
                        "label" =>"SMTP端口",
                        "key" =>"mail_port",
                        "val" =>"994",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"eg:465/994",
                        "sort" =>10
                    ],
                    [
                        "label" =>"用户名",
                        "key" =>"mail_username",
                        "val" =>"email@163.com",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"邮箱登录账号",
                        "sort" =>10
                    ],
                    [
                        "label" =>"邮箱密码",
                        "key" =>"mail_password",
                        "val" =>"xxx",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"邮箱登录密码",
                        "sort" =>10
                    ]
                ]
            ],
            [
                "name" =>"登录配置",
                "sort" =>4,
                "local" =>"backend",
                "config" =>[
                    [
                        "label" =>"站点名称",
                        "key" =>"site_name",
                        "val" =>"HB Admin",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"站点名称(副)",
                        "key" =>"site_aword",
                        "val" =>"总 有 人 山 高 路 远 为 你 而 来",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"站点LOGO",
                        "key" =>"site_logo",
                        "val" =>"/static/admin/admin/images/logo.png",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"登录页背景",
                        "key" =>"login_background",
                        "val" =>"/static/admin/admin/images/background.svg",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ]
                ]
            ],
            [
                "name" =>"ICP配置",
                "sort" =>5,
                "local" =>"frontend",
                "config" =>[
                    [
                        "label" =>"ICP备案号",
                        "key" =>"icp_no",
                        "val" =>"宁ICP123123123",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"备案名称",
                        "key" =>"icp_title",
                        "val" =>"XX公司官网",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"工信部地址",
                        "key" =>"icp_link",
                        "val" =>"http://beian.miit.gov.cn/",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ]
                ]
            ],
            [
                "name" =>"Banner",
                "sort" =>6,
                "local" =>"frontend",
                "config" =>[]
            ],
            [
                "name" =>"联系方式",
                "sort" =>7,
                "local" =>"frontend",
                "config" =>[
                    [
                        "label" =>"邮箱",
                        "key" =>"concat_email",
                        "val" =>"aaaaa@email.com",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"电话",
                        "key" =>"concat_phone",
                        "val" =>"010-45486546",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ],
                    [
                        "label" =>"公司地址",
                        "key" =>"concat_address",
                        "val" =>"XXX省XXX市XXX区,XXX大厦XX楼X-XX号",
                        "type" =>"input",
                        "content" =>"",
                        "tips" =>"",
                        "sort" =>10
                    ]
                ]
            ]
        ];
        file_put_contents($filename,json_encode($data,JSON_UNESCAPED_UNICODE));
        return file_exists($filename);
    }

    /**
     * 初始化类别数据
     * @author: hongbinwang
     * @time  : 2021/8/9 17:08
     */
    protected static function writeCategoriesFile($filename)
    {
        $data = [
            ['name' => '默认分类', 'sort' => '0', 'type' => '10'],
            ['name' => '新闻', 'sort' => '1', 'type' => '10'],
            ['name' => '通知', 'sort' => '2', 'type' => '10'],
            ['name' => '公告', 'sort' => '3', 'type' => '10'],
            ['name' => '资讯', 'sort' => '4', 'type' => '10'],
        ];
        file_put_contents($filename,json_encode($data,JSON_UNESCAPED_UNICODE));
        return file_exists($filename);
    }
}

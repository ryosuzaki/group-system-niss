<?php

use App\Models\Group\Group;
use App\User;
use GroupSystem\Niss\Models\Evacuation;
use GroupSystem\Niss\Models\HealthRecord;
use GroupSystem\Niss\Models\Rescue;

return [
    "name"=>"niss",

    'evacuation'=>[
        'model'=>Evacuation::class,

    ],

    'rescue'=>[
        'model'=>Rescue::class,

        'rescue'=>'救助中',
        'unrescue'=>'救助者がいません',
        'rescued'=>'救助完了',
    ],

    'health_record'=>[
        'model'=>HealthRecord::class,


    ],

    
    "group_types"=>[
        'nursing_home'=>[
            "name"=> "介護施設",
            "initial_info"=>[
                "niss/rescue",
                "niss/health_record",
            ],
            "viewable_user_info"=>[
                "niss/evacuation",
                "niss/user_info",
                "niss/health_record",
                "niss/medical_info",
                "niss/welfare_info",
                "niss/family_info",
            ],
            "admin"=>[
                "name"=>"管理者",
            ],
            "permission"=>[
                'group_infos'=>true,
                'group_roles'=>true,
            ],
            "view"=>[
                "show"=>[
                    "path"=>"group_system_niss::nursing_home.show",
                ],
                "create"=>[
                    "path"=>"group_system_niss::nursing_home.create",
                ],
                "home"=>[
                    "path"=>"group_system_niss::nursing_home.home",
                ],
            ],
        ],
    ],
    
    /**
     * 
     */
    "info_templates"=>[
        "niss"=>[
            User::class=>[
                "evacuation"=>[
                    'default_name'=>'避難',
                    'default_info'=>['type'=>'','detail'=>''],                    
                    'description'=>'地点情報を表示します',
                    "edit"=>['name'=>'変更','icon'=>'<i class="material-icons">edit</i>'],
                    'default_viewable'=>false,
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::user.evacuation.show',
                        ],
                        'edit'=>[
                            'path'=>'group_system_niss::user.evacuation.edit',
                        ],
                    ],
                    "constructor"=>[
                        "class"=>Evacuation::class,
                        "function"=>"infoConstructor",
                    ],
                ],
                
                "user_info"=>[
                    'default_name'=>'利用者情報',
                    'default_info'=>['body'=>''],
                    'default_viewable'=>false,                
                    'description'=>'基本の情報表示',
                    "edit"=>['name'=>'変更','icon'=>'<i class="material-icons">edit</i>'],
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::user.user_info.show',
                        ],
                        'edit'=>[
                            'path'=>'group_system_niss::user.user_info.edit',
                        ],
                    ],
                ],
                "health_record"=>[
                    "default_name"=>"健康記録",
                    'default_info'=>['not_use_items'=>[]], 
                    'default_viewable'=>false,                   
                    'description'=>'健康記録',
                    "edit"=>['name'=>'変更','icon'=>'<i class="material-icons">edit</i>'],
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::user.health_record.show',
                        ],
                        'edit'=>[
                            'path'=>'group_system_niss::user.health_record.edit',
                        ],
                    ],
                    "constructor"=>[
                        "class"=>HealthRecord::class,
                        "function"=>"infoConstructor",
                    ],
                ],
                "medical_info"=>[
                    'default_name'=>'医療',
                    'default_info'=>['type'=>'','detail'=>''],
                    'default_viewable'=>false,                
                    'description'=>'地点情報を表示します',
                    "edit"=>['name'=>'変更','icon'=>'<i class="material-icons">edit</i>'],
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::user.medical_info.show',
                        ],
                        'edit'=>[
                            'path'=>'group_system_niss::user.medical_info.edit',
                        ],
                    ],
                ],
                "welfare_info"=>[
                    'default_name'=>'福祉',
                    'default_info'=>[],
                    'default_viewable'=>false,
                    'description'=>'お知らせ',
                    'edit'=>['name'=>'送信','icon'=>'<i class="material-icons">mail_outline</i>'],
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::user.welfare_info.show',
                        ],
                        'edit'=>[
                            'path'=>'group_system_niss::user.welfare_info.edit',
                        ],
                    ],
                ],
                "family_info"=>[
                    'default_name'=>'家族情報',
                    'default_info'=>[],
                    'default_viewable'=>false,
                    'description'=>'お知らせ',
                    'edit'=>['name'=>'送信','icon'=>'<i class="material-icons">mail_outline</i>'],
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::user.family_info.show',
                        ],
                        'edit'=>[
                            'path'=>'group_system_niss::user.family_info.edit',
                        ],
                    ],
                ],
            ],
            
            Group::class=>[
                "health_record"=>[
                    'default_name'=>'健康記録',
                    'default_info'=>[],
                    'default_viewable'=>false,
                    'description'=>'お知らせ',
                    'edit'=>false,
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::group.health_record.show',
                        ],
                    ],
                ],
                "rescue"=>[
                    'default_name'=>'救助',
                    'default_info'=>[],
                    'default_viewable'=>false,
                    'description'=>'お知らせ',
                    'edit'=>false,
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::group.rescue.show',
                        ],
                    ],
                ],
                
            ],
            
        ],
    ],
    
];

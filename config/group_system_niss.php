<?php

use App\Models\Group\Group;
use App\User;

return [
    "name"=>"niss",

    'rescue'=>[
        'rescue'=>'救助中',
        'unrescue'=>'救助者がいません',
        'rescued'=>'救助完了',
    ],

    "group_types"=>[
        'nursing_home'=>[
            "name"=> "介護施設",
            "initial_info"=>[
                "niss/evacuation",
                "niss/health_record",
            ],
            "available_user_info"=>[
                "niss/user_info",
                "niss/health_record",
                "niss/medical_info",
                "niss/evacuation",
                "niss/welfare_info",
                "niss/family_info",
            ],
            "admin"=>[
                "name"=>"管理者",
            ],
            "permission"=>[
                'group_info_bases'=>true,
                'group_roles'=>true,
            ],
            "view"=>[
                "show"=>[
                    "path"=>"group_system_niss::nursing_home.show",
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
                "user_info"=>[
                    'default_name'=>'利用者情報',
                    'default_info'=>['body'=>''],                    
                    'description'=>'基本の情報表示',
                    "default_edit"=>['name'=>'変更','icon'=>'<i class="material-icons">edit</i>'],
                    "only_one"=>true,
                    'view'=>[
                        'show'=>[
                            'path'=>'group_system_niss::user_info.show',
                        ],
                        'edit'=>[
                            'path'=>'group_system_niss::user_info.edit',
                        ],
                    ],
                ],
                "health_record"=>[
                    "default_name"=>"健康記録",
                    'default_info'=>['degree'=>'0','color'=>"black",'detail'=>''],                    
                    'description'=>'混雑状況を表示します',
                    "default_edit"=>['name'=>'変更','icon'=>'<i class="material-icons">edit</i>'],
                    "only_one"=>true,
                ],
                "medical_info"=>[
                    'default_name'=>'医療',
                    'default_info'=>['type'=>'','detail'=>''],                    
                    'description'=>'地点情報を表示します',
                    "default_edit"=>['name'=>'変更','icon'=>'<i class="material-icons">edit</i>'],
                    "only_one"=>true,
                ],
                "evacuation"=>[
                    'default_name'=>'避難状況',
                    'default_info'=>['type'=>'','detail'=>''],                    
                    'description'=>'地点情報を表示します',
                    "default_edit"=>['name'=>'変更','icon'=>'<i class="material-icons">edit</i>'],
                    "only_one"=>true,
                ],
                "welfare_info"=>[
                    'default_name'=>'福祉',
                    'default_info'=>[],
                    'default_viewable'=>true,
                    'description'=>'お知らせ',
                    'default_edit'=>['name'=>'送信','icon'=>'<i class="material-icons">mail_outline</i>'],
                    "only_one"=>true,
                ],
                "family_info"=>[
                    'default_name'=>'家族情報',
                    'default_info'=>[],
                    'default_viewable'=>true,
                    'description'=>'お知らせ',
                    'default_edit'=>['name'=>'送信','icon'=>'<i class="material-icons">mail_outline</i>'],
                    "only_one"=>true,
                ],
            ],
            Group::class=>[
                "health_record"=>[
                    'default_name'=>'健康記録',
                    'default_info'=>[],
                    'default_viewable'=>true,
                    'description'=>'お知らせ',
                    'default_edit'=>['name'=>'送信','icon'=>'<i class="material-icons">mail_outline</i>'],
                    "only_one"=>true,
                ],
                "evacuation"=>[
                    'default_name'=>'避難状況',
                    'default_info'=>[],
                    'default_viewable'=>true,
                    'description'=>'お知らせ',
                    'default_edit'=>['name'=>'送信','icon'=>'<i class="material-icons">mail_outline</i>'],
                    "only_one"=>true,
                ],
            ],
        ],
    ],
    
];

<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 核心中文语言包
return [
    // 系统错误提示
    'Undefined variable'                                        => '未定义变量',
    'Undefined index'                                           => '未定义数组索引',
    'Undefined offset'                                          => '未定义数组下标',
    'Parse error'                                               => '语法解析错误',
    'Type error'                                                => '类型错误',
    'Fatal error'                                               => '致命错误',
    'syntax error'                                              => '语法错误',

    // 框架核心错误提示
    'dispatch type not support'                                 => '不支持的调度类型',
    'method param miss'                                         => '方法参数错误',
    'method not exists'                                         => '方法不存在',
    'function not exists'                                       => '函数不存在',
    'file not exists'                                           => '文件不存在',
    'module not exists'                                         => '模块不存在',
    'controller not exists'                                     => '控制器不存在',
    'class not exists'                                          => '类不存在',
    'property not exists'                                       => '类的属性不存在',
    'template not exists'                                       => '模板文件不存在',
    'illegal controller name'                                   => '非法的控制器名称',
    'illegal action name'                                       => '非法的操作名称',
    'url suffix deny'                                           => '禁止的URL后缀访问',
    'Route Not Found'                                           => '当前访问路由未定义或不匹配',
    'Undefined db type'                                         => '未定义数据库类型',
    'variable type error'                                       => '变量类型错误',
    'PSR-4 error'                                               => 'PSR-4 规范错误',
    'not support total'                                         => '简洁模式下不能获取数据总数',
    'not support last'                                          => '简洁模式下不能获取最后一页',
    'error session handler'                                     => '错误的SESSION处理器类',
    'not allow php tag'                                         => '模板不允许使用PHP语法',
    'not support'                                               => '不支持',
    'redisd master'                                             => 'Redisd 主服务器错误',
    'redisd slave'                                              => 'Redisd 从服务器错误',
    'must run at sae'                                           => '必须在SAE运行',
    'memcache init error'                                       => '未开通Memcache服务，请在SAE管理平台初始化Memcache服务',
    'KVDB init error'                                           => '没有初始化KVDB，请在SAE管理平台初始化KVDB服务',
    'fields not exists'                                         => '数据表字段不存在',
    'where express error'                                       => '查询表达式错误',
    'order express error'                                       => '排序表达式错误',
    'no data to update'                                         => '没有任何数据需要更新',
    'miss data to insert'                                       => '缺少需要写入的数据',
    'not support data'                                          => '不支持的数据表达式',
    'miss complex primary data'                                 => '缺少复合主键数据',
    'miss update condition'                                     => '缺少更新条件',
    'model data Not Found'                                      => '模型数据不存在',
    'table data not Found'                                      => '表数据不存在',
    'delete without condition'                                  => '没有条件不会执行删除操作',
    'miss relation data'                                        => '缺少关联表数据',
    'tag attr must'                                             => '模板标签属性必须',
    'tag error'                                                 => '模板标签错误',
    'cache write error'                                         => '缓存写入失败',
    'sae mc write error'                                        => 'SAE mc 写入错误',
    'route name not exists'                                     => '路由标识不存在（或参数不够）',
    'invalid request'                                           => '非法请求',
    'bind attr has exists'                                      => '模型的属性已经存在',
    'relation data not exists'                                  => '关联数据不存在',
    'relation not support'                                      => '关联不支持',
    'chunk not support order'                                   => 'Chunk不支持调用order方法',
    'route pattern error'                                       => '路由变量规则定义错误',
    'route behavior will not support'                           => '路由行为废弃（使用中间件替代）',
    'closure not support cache(true)'                           => '使用闭包查询不支持cache(true)，请指定缓存Key',

    // 上传错误信息
    'unknown upload error'                                      => '未知上传错误！',
    'file write error'                                          => '文件写入失败！',
    'upload temp dir not found'                                 => '找不到临时文件夹！',
    'no file to uploaded'                                       => '没有文件被上传！',
    'only the portion of file is uploaded'                      => '文件只有部分被上传！',
    'upload File size exceeds the maximum value'                => '上传文件大小超过了最大值！',
    'upload write error'                                        => '文件上传保存错误！',
    'has the same filename: {:filename}'                        => '存在同名文件：{:filename}',
    'upload illegal files'                                      => '非法上传文件',
    'illegal image files'                                       => '非法图片文件',
    'extensions to upload is not allowed'                       => '上传文件后缀不允许',
    'mimetype to upload is not allowed'                         => '上传文件MIME类型不允许！',
    'filesize not match'                                        => '上传文件大小不符！',
    'directory {:path} creation failed'                         => '目录 {:path} 创建失败！',

    'The middleware must return Response instance'              => '中间件方法必须返回Response对象实例',
    'The queue was exhausted, with no response returned'        => '中间件队列为空',
    // Validate Error Message
    ':attribute require'                                        => ':attribute不能为空',
    ':attribute must'                                           => ':attribute必须',
    ':attribute must be numeric'                                => ':attribute必须是数字',
    ':attribute must be integer'                                => ':attribute必须是整数',
    ':attribute must be float'                                  => ':attribute必须是浮点数',
    ':attribute must be bool'                                   => ':attribute必须是布尔值',
    ':attribute not a valid email address'                      => ':attribute格式不符',
    ':attribute not a valid mobile'                             => ':attribute格式不符',
    ':attribute must be a array'                                => ':attribute必须是数组',
    ':attribute must be yes,on or 1'                            => ':attribute必须是yes、on或者1',
    ':attribute not a valid datetime'                           => ':attribute不是一个有效的日期或时间格式',
    ':attribute not a valid file'                               => ':attribute不是有效的上传文件',
    ':attribute not a valid image'                              => ':attribute不是有效的图像文件',
    ':attribute must be alpha'                                  => ':attribute只能是字母',
    ':attribute must be alpha-numeric'                          => ':attribute只能是字母和数字',
    ':attribute must be alpha-numeric, dash, underscore'        => ':attribute只能是字母、数字和下划线_及破折号-',
    ':attribute not a valid domain or ip'                       => ':attribute不是有效的域名或者IP',
    ':attribute must be chinese'                                => ':attribute只能是汉字',
    ':attribute must be chinese or alpha'                       => ':attribute只能是汉字、字母',
    ':attribute must be chinese,alpha-numeric'                  => ':attribute只能是汉字、字母和数字',
    ':attribute must be chinese,alpha-numeric,underscore, dash' => ':attribute只能是汉字、字母、数字和下划线_及破折号-',
    ':attribute not a valid url'                                => ':attribute不是有效的URL地址',
    ':attribute not a valid ip'                                 => ':attribute不是有效的IP地址',
    ':attribute must be dateFormat of :rule'                    => ':attribute必须使用日期格式 :rule',
    ':attribute must be in :rule'                               => ':attribute必须在 :rule 范围内',
    ':attribute be notin :rule'                                 => ':attribute不能在 :rule 范围内',
    ':attribute must between :1 - :2'                           => ':attribute只能在 :1 - :2 之间',
    ':attribute not between :1 - :2'                            => ':attribute不能在 :1 - :2 之间',
    'size of :attribute must be :rule'                          => ':attribute长度不符合要求 :rule',
    'max size of :attribute must be :rule'                      => ':attribute长度不能超过 :rule',
    'min size of :attribute must be :rule'                      => ':attribute长度不能小于 :rule',
    ':attribute cannot be less than :rule'                      => ':attribute日期不能小于 :rule',
    ':attribute cannot exceed :rule'                            => ':attribute日期不能超过 :rule',
    ':attribute not within :rule'                               => '不在有效期内 :rule',
    'access IP is not allowed'                                  => '不允许的IP访问',
    'access IP denied'                                          => '禁止的IP访问',
    ':attribute out of accord with :2'                          => ':attribute和确认字段:2不一致',
    ':attribute cannot be same with :2'                         => ':attribute和比较字段:2不能相同',
    ':attribute must greater than or equal :rule'               => ':attribute必须大于等于 :rule',
    ':attribute must greater than :rule'                        => ':attribute必须大于 :rule',
    ':attribute must less than or equal :rule'                  => ':attribute必须小于等于 :rule',
    ':attribute must less than :rule'                           => ':attribute必须小于 :rule',
    ':attribute must equal :rule'                               => ':attribute必须等于 :rule',
    ':attribute has exists'                                     => ':attribute已存在',
    ':attribute not conform to the rules'                       => ':attribute不符合指定规则',
    'invalid Request method'                                    => '无效的请求类型',
    'invalid token'                                             => '令牌数据无效',
    'not conform to the rules'                                  => '规则错误',

    // 老用户
    'MNEMONIC_ERROR'                          => '您输入的助记词不正确，请检查确认后重新操作',
    'PRIVATE_KEY_ERROR'                          => '您输入的私钥不正确，请检查确认后重新操作',
    'THE_VERIFIED_DATA_DOES_NOT_EXIST'                          => '你验证所使用的资料不存在,请重试',
    'VERIFICATION_IS_WRONG'                                     => '你验证所使用的{:value}有误,请检查确认后进行验证',
    'MNEMONIC'                                                  => '助记词',
    'PRIVATE'                                                   => '私钥',
    'FAILURE'                                                   => '失败',
    'SENT_SUCCESSFULLY'                                         => '发送成功',
    'GET_SUCCESS'                                               => '获取成功',
    'GET_FAILED'                                                => '获取失败',
    'REGISTRATION_SUCCESSFUL'                                   => '注册成功,请先登录',
    'INFO_ERROR'                                                => '信息错误',
    'CREATING_WALLET_ERROR'                                     => '创建用户钱包时出错',
    'VERIFICATION_PASSED'                                       => '验证通过',
    'SUCCESS'                                                   => '成功',
    'ERROR'                                                     => '错误',
    'CREATING_USER_BASE_INFO_ERROR'                             => '创建用户基本信息错误',
    'CREATING_USER_SHARE_INFO_ERROR'                            => '创建用户分享信息失败',
    'CREATING_USER_WALLET_ADDRESS_ERROR'                        => '创建用户钱包地址失败',
    'OBTAIN_USER_WALLET_ADDRESS_ERROR'                          => '获取用户钱包地址失败',
    'CREATING_USER_WALLET_ERROR'                                => '创建用户钱包错误',
    'ACCOUNT_HAS_BEEN_REGISTER'                                 => '该手机号码已被注册！',
    'VERIFICATION_CODE_TYPE_ERROR'                              => '验证码类型错误！',
    'PLEASE_SEND_AGAIN_LATER'                                   => '请稍后再发送',
    'PLEASE_SEND_THE_VERIFICATION_CODE_FIRST'                   => '请先发送验证码',
    'PHONE_HAS_ALREADY_BEEN_BOUND'                              => '该手机号码已经被绑定过了',

    // 新用户注册激活
    'ACTIVATION_PARAMETER_ABNORMAL'                             => '获取用户激活参数信息异常',
    'FUNDS_WALLET_IS_UNAVAILABLE'                               => '您的资金钱包不可用',
    'THE_ACCOUNT_HAS_BEEN_ACTIVATED'                            => '该账号已被激活',
    'FUND_PASSWORD_ERROR'                                       => '资金密码错误',
    'BE_ACTIVATED_MOBILE_DOES_NOT_EXIST'                        => '被激活的手机号不存在，或不是新用户',
    'PLEASE_WAIT_FOR_THE_OTHER_PARTY_TO_CONFIRM'                => '您已发出激活邀请，请等待对方确认',
    'YOU_HAVE_SUCCESSFULLY_ACTIVATED_THE_ACCOUNT'               => '您已成功激活该用户',
    'ACTIVATION_FAILS'                                          => '激活失败',
    'TO_BE_CONFIRMED'                                           => '待确认',
    'SUCCEEDED'                                                 => '已成功',
    'HAS_FAILED'                                                => '已失败',
    'ALMOST_EXPIRED'                                            => '已失效',
    'TO_BE_AGREED'                                              => '待同意',
    'REJECTED'                                                  => '已拒绝',
    'DATA_DOES_NOT_EXIST'                                       => '数据不存在',
    'PLEASE_DO_NOT_AGREE_AGAIN'                                 => '已同意，请勿重复同意',
    'PLEASE_DO_NOT_REJECTED_AGAIN'                              => '已拒绝，请勿重复拒绝',
    'ACTIVATION_INVITATION_SUCCESSFUL'                          => '激活邀请成功',

    'VERIFICATION_CODE_ERROR'                          => '验证码不正确',
    'THE_TWO_PASSWORD_ERROR'                          => '密码不一致',
    'FUND_NAME_PASSWORD_ERROR'                                       => '钱包名或资金密码错误',
    'LOGIN_SUCCESS'                                       => '登录成功',
    'LOGIN_NO_USERINFO_ERROR'                                       => '找不到用户信息',
    'REGISTER_VALI_MNEMONIC'                                       => '助记词已存在，请重新注册',
    'REGISTER_VALI_PRIVATEkEY'                                       => '私钥已存在，请重新注册',

    // 首页更多分类
    'HOME_COMMERCE_ACADEMY' => '상 학원',
    'HOME_MORE' => '더',
    'HOME_TRANSFER' => '이전',
    'HOME_MINING_POOL' => '마이닝 풀',
    'HOME_SUBSCRIBE' => '구독',
    'HOME_LEDGER' => '원장',
    'HOME_INVITATION_TO_ACTIVATE' => '활성화 초대',
    'HOME_BLOCK_QUERY' => '블록 쿼리',
    'HOME_DAFI' => 'DaFi',
    'HOME_RED_ENVELOPE' => '빨간 봉투',
    'HOME_CONVERT' => '교환',
    'HOME_MALL' => '쇼핑 센터',
    'HOME_CULTURE' => '문화',
    'HOME_TOURISM' => '관광 여행',
    'HOME_CIRCLE_INFORMATION' => '서클 정보',
    'HOME_COMMUNITY' => '커뮤니티',
    'HOME_MINING_MACHINE' => '광산 기계',

    'PAYEE_ERROR' => '수취인 오류',
    'QUANTITY_MUST_BE_A_NUMBER' => '수량은 숫자 여야합니다',
    'PLEASE_ACTIVATE_YOURSELF_FIRST' => '먼저 자신을 활성화하십시오',
    'THE_ACTIVE_USER_DOES_NOT_EXIST' => '활성 사용자가 없습니다',
    'USER_HAS_BEEN_ACTIVATED' => '사용자가 활성화되었습니다',

    'YOU_HAVE_BEEN_FROZEN_AND_CANNOT_TRADE' => '당신은 동결되어 거래 할 수 없습니다',
    'YOU_HAVE_NOT_ACTIVATED_YET_AND_CANNOT_TRADE' => '아직 활성화하지 않았으며 거래 할 수 없습니다',
    'NOT_YET_OPEN' => '아직 열리지 않음',
    'SYSTEM_ERROR' => '시스템 오류',
    'PLEASE_ENTER_THE_CORRECT_PRICE' => '정확한 가격을 입력하세요',
    'USER_DOES_NOT_EXIST' => '사용자가 존재하지 않습니다',

    // 兑换
    'SORRY_THE_EXCHANGE_IS_NOT_YET_OPEN' => '죄송합니다. 아직 거래소가 열려 있지 않습니다',
    'FAILED_TO_GET_WALLET' => '지갑을 가져 오지 못했습니다',
    'FAILED_TO_GET_MARKET_INFORMATION' => '시장 정보를 가져 오지 못했습니다. 나중에 다시 시도하십시오',
    'DO_NOT_REPEAT_REQUEST' => '요청을 반복하지 마십시오',
    'WALLET_UNAVAILABLE' => '지갑을 사용할 수 없습니다',
    'INSUFFICIENT_AVAILABLE_BALANCE' => '수수료 지갑을 사용할 수 없습니다',
    'INSUFFICIENT_HANDLING_FEE' => '취급 수수료 부족',
    'MINIMUM_EXCHANGE_AMOUNT' => '{:name}최소 교환 금액은：{:min_quantity}',

    // 账单类型
    'ASSET_RECOVERY' => '자산 회수',
    'RECHARGE' => '재충전',
    'GIFT_MONEY' => '선물 돈',
    'ACTIVATION' => '활성화',
    'TRANSFER_OUT' => '송금',
    'TRANSFER_IN' => '환승',
    'TRANSFER_FEE' => '환승 요금',
    'CURRENCY_TRANSFER' => '통화 거래',
    'CANCELLATION_OF_CURRENCY_TRANSACTIONS' => '통화 거래 취소',
    'EXCHANGE' => '교환',
    'EXCHANGE_FEE' => '교환 수수료',
    'WITHDRAW' => '빼다',
    'WITHDRAW_FEE' => '인출 수수료',
    'WITHDRAWAL_FAILURE_REFUND' => '출금 실패 환불',
    'BACKGROUND_MODIFICATION' => '배경 수정',
    'MODIFY_THE_BALANCE_IN_THE_BACKGROUND' => '백그라운드에서 잔액 수정',
    'MODIFY_THE_FROZEN_AMOUNT_IN_THE_BACKGROUND' => '백그라운드에서 고정 된 양 수정',
    'BUY_MINING_MACHINE' => '마이닝 머신 구매',
    'REWARD_STRAIGHT' => '수익 공유',
    'REWARD_INDIRECT' => '수익 공유',
    'REWARD_DIFFERENTIAL' => '팀 혜택',
    'UPGRADE_MINING_MACHINE' => '광부 업그레이드',
    'REWARD_SAME_LEVEL' => '동등한 소득',

    'THE_WALLET_ACCOUNT_IS_NOT_ACTIVATED_AND_CANNOT_BE_PURCHASED' => '지갑 계정이 활성화되지 않아 구매할 수 없습니다.',
    'PLEASE_ACTIVATE_YOUR_ACCOUNT_FIRST' => '먼저 계정을 활성화하십시오',
];

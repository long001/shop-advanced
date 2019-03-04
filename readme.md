1. 了解了 Laravel-Shop 的基本模型和产品功能；
2. 理清了 Laravel-Shop 的开发思路；
3. 在 Homestead 里创建 shop.test 项目；
4. 创建了 Laravel-Shop 基础项目文件；
5. 利用 Composer.json 文件来加载自定义函数；
6. 项目页面创建了基础布局。
7. 用户的登录与注册；
8. 使用 MailHog 捕获测试邮件；
9. 使用 Laravel 内置的 Notification 功能发送邮件；
10. 优雅地处理 Laravel 项目中的异常；
11. 事件与监听器的使用；
12. 用户收货地址的增删改查；
13. 地址联动选择器；
14. 使用授权策略来控制权限；
15. 使用 overtrue/laravel-lang 来汉化错误信息。
16. laravel-admin 扩展包的安装；
17. laravel-admin 扩展包的配置；
19. laravel-admin 快速构建用户列表页面；
20. laravel-admin 设置管理员权限。
21. 商品 SKU 的概念。
22. 构建后台商品列表页面；
23. 构建后台新增商品和编辑商品页面及逻辑；
24. 用户端的商品列表页面；
25. 使用查询构造器根据用户输入来动态构建查询 SQL；
26. 用户端的商品详情页面；
27. 收藏商品和取消收藏的功能；
28. 设置 Laravel 路由的顺序。
29. 购物车的数据库结构设计；
30. 使用闭包来校验用户输入；
31. 完成了将商品加入购物的功能；
32. 订单流水号的生成；
33. 创建订单时应保存用户收货地址的快照而非 ID；
34. 代表状态的值应使用常量；
35. 在 Laravel 中使用数据库事务的正确姿势；
36. 高并发下减商品库存的正确姿势；
37. 使用延迟队列自动关闭未支付订单；
38. 完成了用户端订单列表的展示；
39. 使用预加载与延迟预加载解决数据库 N + 1 问题；
40. 完成了用户端订单详情页的展示；
41. 使用 Service 模式对业务代码的封装来提高代码的复用性。
42. 完成了yansongda/pay 的安装与配置；
43. 支付宝沙箱账号的申请与配置；
44. 微信扫码支付的开通与配置；
45. 支付宝、微信支付的前端回调与后端回调；
46. 在本地开发环境如何处理支付宝、微信支付后端回调；
47. 了解了二维码的生成；
48. 使用事件及监听器完成了支付后的更新销量与邮件通知。
49. 完成了管理后台订单列表页面；
50. 完成了管理后台订单详情页面；
51. 完成了后台发货和用户端确认收货的功能；
52. 完成了商品评价功能；
53. 使用事件及监听器完成商品评分的更新；
54. 完成了用户端申请退款功能；
55. 完成了管理后台处理退款的功能；
56. 完成了支付宝、微信支付的退款处理。
57. 实现了管理后台对优惠券的增删改查；
58. 实现了下单时使用优惠券扣减支付金额的功能；
60. 实现了一个优惠券只能被一个用户使用一次的功能。
61. 设置了所有模块在管理后台的权限；
62. 完善了所有模块的工厂文件和 Seed 文件；
63. 实现了 Laravel-Admin 配置的备份与恢复；
64. Web 项目漏洞类型及在 Laravel 项目中的防御措施。

65. 商品类目的数据库结构设计；
66. 为商品表添加了类型字段；
67. 使用 Laravel-Admin 实现管理后台商品类目的增删改查；
68. 在管理后台商品编辑页面添加商品类目下拉框；
69. 用 Laravel-Admin 实现一个异步加载下拉框；
70. 面包屑导航；
71. 使用递归方式构建类目树；
72. ViewComposer 的使用。

73. 众筹的业务逻辑；
74. 众筹商品的数据库结构设计；
75. 用 Laravel-Admin 实现管理后台众筹商品的增删改查；
76. 封装了管理后台商品控制器；
77. 实现了众筹商品的下单逻辑；
78. 在订单表加入了类型字段；
79. 实现了支付成功后更新众筹进度的逻辑；
80. 使用 Ngrok 实现内网穿透；
81. 使用定时任务的方式触发众筹结束逻辑；
82. 使用异步任务提高定时任务执行效率。

83. 分期付款的业务逻辑；
84. 分期付款的数据库结构设计；
85. 将分期付款作为一种订单支付方式；
86. 涉及到金钱的数值计算方式；
87. 使用支付宝、微信还款；
88. 使用定时任务计算逾期费用；
89. 使用 chunkById() 减少内存占用；
90. 使用异步任务实现多笔订单的退款。
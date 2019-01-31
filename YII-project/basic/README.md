# 基于[YII2](https://www.yiichina.com/doc/guide/2.0)的管理系统

- 功能介绍
    ```
    1. 入口文件在 ./web/index.php
    2. 配置文件在 config/web.php
    3. mvc 对应的模块分别在 controllers, views, models 文件下，可配置
    4. 框架自带文件为 site 文件，默认开启也是 site
    5. 本系统 已修改为 system 前缀文件或文件夹
    6. 开启应用前需安装 composer 安装依赖，类似于 npm、yarn等
    7. view 层中 index 是列表页，contact 是修改、添加功能
    ```
- LibraryController负责给 [library](https://github.com/huochezaodian/library) 系统提供web api

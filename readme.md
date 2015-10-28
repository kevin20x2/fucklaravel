+数据库课程设计，图书管理系统，Laravel + bootstrap + MySQL

+update on 2015.10.3.22.32

---
增加查询控制器  
FaqController.php  
增加视图  
faq.blade.php  
修改视图  
home.blade.php  
新增功能:  
查询书信息  
待完善: faq.blade.php //主要是界面太丑
try :  进入home界面

---

update on 2015.10.4.2.06

---
1. 修改控制器  
 BookController 添加了show函数的部分  
* 增加视图    
 admin.books.show // 显示书的信息  
* 增加了书名上的链接  
* 解决了编码问题： 将php文件中的编码改成utf-8即可  
在vim下执行
```
:set fileencoding=utf-8
```
即可。
* 各种视图仍然待完善

---
update on 2015.10.6.1.00

---

1. 大修改: 重新写了有关用户认证的功能
根据[这里](https://phphub.org/topics/804)
* 增加了借书部分，预约部分，搜索部分  
主要见 bookcontroller ， revervecontroller ，faqcontroller
* 增加了警告信息的提示， 见flash.blade.php
* 至此大体功能已经能够实现，剩下需要一些修改和添加  

#### 剩下的工作
---

* 添加显示预约情况的视图
* 完成对各个数据段输入的约束
* 改进界面
* 改进逻辑不太严谨的地方

### 续借逻辑
- 书被预约了不能续借
- 没到续借时间不能续借（提前3天才能续借）
- 续借过的书不能再次续借

### 预约逻辑
- 达到预约最大数目不能再预约
- 书没被借走了不能预约
- 超过预约时间预约失效

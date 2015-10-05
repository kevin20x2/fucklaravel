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

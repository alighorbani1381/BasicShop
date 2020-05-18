<?php
#Set POST Request for Any send & recive From HTTP
const request = "POST";

#Edit Profile in Panel Admin
$ProfileEdit_Validation = ["name" => "required/format=text", "lastname" => "required/format=text", "city" => "required/format=text", "mobile" => "required/format=iranian_phone", "job" => "required",];
$ProfileEdit_Attribute = ["name", "lastname", "city", "mobile", "job", "birthday", "email"];

#Singup Validation in Web Site
$SingupUser_Validation = ["name" => "required/format=text/max=15/min=3", "lastname" => "required/format=text/max=25/min=8", "password" => "required/format=number/min=8", "email" => "required/format=email",];
$SingupUser_Bind = ['name', 'lastname', 'password', 'email',];

#Procat ADD
$ProcatValidation = ['title' => 'required/format=text/min=5', 'chid' => 'format=number',];
$ProcatBind = ['title', 'chid'];

#ProductEdit & Product Insert
$ProductValidation = ["title" => 'required', "text" => 'required', "off" => 'format=number/min=0/max=100', "price" => 'required/format=number', "count" => 'required/format=number', "cat_id" => 'format=number',];
$ProductBind = ['title', 'text', 'price', 'off', 'count', 'cat_id'];

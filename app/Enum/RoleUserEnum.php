<?php

namespace App;

enum RoleUserEnum :string
{
     case ADMIN ='admin';
     case USER = 'user';
     case EDITOR = 'editor';

}

<?php

namespace App\Models;

use BaoPham\DynamoDb\DynamoDbModel;


class Student extends DynamoDbModel
{

    protected $fillable = ['Id', 'Name', 'Reg', 'CreatedAt', 'updated_at', 'created_at'];
    protected $table = 'students2';
    protected $primaryKey = 'Id';

//    protected $dynamoDbIndexKeys = [
//        'S' => 'Id',
//    ];
}

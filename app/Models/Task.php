<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model // 컨트롤러에 의해 호출되어 DB에 데이터를 저장하거나 DB에서 데이터를 가져와서 뷰가 사용할 수 있는 형태로 컨트롤러에 반환한다.
{
    use HasFactory;
    protected $table = 'tasks';
}

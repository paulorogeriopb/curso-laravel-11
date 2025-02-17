<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use \OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Classe extends Model implements Auditable
{
    use HasFactory, AuditingAuditable;

    // Indicar o nome da tabela
    protected $table = 'classes';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['name', 'description', 'order_classe', 'course_id'];

    // Criar relacionamento entre um e muitos
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}

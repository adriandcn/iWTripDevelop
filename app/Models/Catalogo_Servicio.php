<?php namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
class Catalogo_Servicio extends Model
{
    //
    
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'catalogo_servicios';
        
         /* Representacion de Eloquent de que un usuario operador tiene varios usuario servicios */
    public function catalogo_usuario_servicios(){
        
        return $this->hasMany('App\Models\Usuario_Servicio');
        
    }
}

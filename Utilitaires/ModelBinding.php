<?php
/**
 * Created by PhpStorm.
 * User: Simon Boyer
 * Date: 04/04/18
 * Time: 23:44
 */

class ModelBinding
{
    /** @var mysql $bd */
    private $bd;
    private $modelState;
    public function __construct(Array $properties=array(), $binAjout=false)
    {
        $bd = $GLOBALS['BD'];
        $this->modelState = $binAjout ? ModelState::Added : ModelState::Same;
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function saveChangesOnObj(){
        if($this->modelState != ModelState::Same && $this->modelState != ModelState::Invalid) {
            switch ($this->modelState) {
                case ModelState::Added:
                    $this->modelState = $this->bd->insereEnregistrementTb(get_class($this),call_user_func('get_object_vars()', $this)) ?
                        ModelState::Same : ModelState::Invalid;
                    break;
            }
        }
    }

    public static function bindToClass($result, $class){
        $objBinded = [];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $objBinded[] = new $class($row);
            }
        }
        return $objBinded;
    }
}
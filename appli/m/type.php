<?php
namespace APPLI\M;

class Type extends \MVC\Modele {
    protected $_tableName='type';
    protected $_tableRow='\APPLI\M\MarqueRow';
    

    public function getTypeByTypeSupp($id_supp)
    {
        $result = $this->where("id_supp=?", array($id_supp));
        return $result;
    }
    
    public function hasSubType($id)
    {
        $result = $this->where("id_supp=?", array($id));
        return !empty($result);
    }

    public function getSupType($id)
    {
        $result = $this->where("id=?", array($id));
        
        if(sizeof($result)>0)
        {
            return $result[0]->id_supp;
        }   
        else 
        {
            return 0;
        }
    }
    
    public function getName($id)
    {
        $result = $this->where("id=?", array($id));
        
        if(empty($result))
        {
            return "";
        }
        
        return $result[0]->libelle;
    }
}

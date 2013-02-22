<?php



use \Omeka_Record;

/**
 * 
 */
class PRLRelations extends Omeka_Plugin_Abstract {

    /**
     * hooks array
     * The hooks that you declare you are using in the $_hooks array must have a corresponding public method of the form hook{Hookname} as above. 
     * @link http://omeka.org/codex/Plugin_Writing_Best_Practices Plugins Best-practices
     * @var string[] the set of hooks that this plugin uses
     */
    protected $_hooks = array('install', 'initialize','uninstall');

    public function hookInitialize() {

    }


    /**
     * Do things when the user clicks install, like build DB tables, etc
     * @throws Exception
     */
    function hookInstall() {
//        $db = get_db()cou;
//die("got to the installer method...");
        $this->_saveVocabularies();
    }


  
    function hookUninstall() {
        
    }

    private function _saveVocabularies(){
        // Install the formal vocabularies and their properties.
        $db  = get_db();
        $fVs = include 'formal_vocabularies.php';
        $irp = $db->getTable('ItemRelationsProperty');
        $irv = $db->getTable('ItemRelationsVocabulary');
        
        foreach ($fVs as $fV) {
            
            echo $fV['name'];
            
            
            //check for existing vocab
            $found = $irv->findBySql('name = ? ', array($fV['name']));
         
            
            $vocab = !isset($found[0]) ? new ItemRelationsVocabulary() : $found[0];
            
            $vocab->name               = $fV['name'];
            $vocab->custom             = 0;
            $vocab->description        = $fV['description'];
            $vocab->namespace_uri      = $fV['namespace_uri'];
            $vocab->namespace_prefix   = $fV['namespace_prefix'];
            
            $vocab->save();
            
            foreach ($fV['properties'] as $fP) {
                
                //check for existing property
                $found = $irp->findBySql('local_part = ? ',array($fP['local_part']));
                $prop  = !isset($found[0]) ? new ItemRelationsProperty() : $found[0];
                
                $prop->vocabulary_id   = $vocab->id;
                $prop->description     = $fP['description'];
                $prop->local_part      = $fP['local_part'];
                $prop->label           = $fP['label'];
                
                $prop->save();
                
                debug(sprintf("saved property %s in vocabulary %s", $prop->local_part, $vocab->name));  
              
            }
        
             
       
        }
    }

}
$prlRelations = new PRLRelations();
$prlRelations->setUp();


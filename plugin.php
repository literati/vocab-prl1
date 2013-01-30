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
//        $db = get_db();
//die("got to the installer method...");
        $this->_saveVocabularies();
    }


  
    function hookUninstall() {
        
    }

    private function _saveVocabularies(){
            // Install the formal vocabularies and their properties.
        $formalVocabularies = include 'formal_vocabularies.php';
        foreach ($formalVocabularies as $formalVocabulary) {
            $vocabulary = new ItemRelationsVocabulary;
            $vocabulary->name = $formalVocabulary['name'];
            $vocabulary->description = $formalVocabulary['description'];
            $vocabulary->namespace_prefix = $formalVocabulary['namespace_prefix'];
            $vocabulary->namespace_uri = $formalVocabulary['namespace_uri'];
            $vocabulary->custom = 0;
            $v = $vocabulary->save();
            if(!$v){
                die("couldn't save record");
            }
            

//            $vocabularyId = $db->lastInsertId();
            $vocabularyId = $vocabulary->id;
            
            foreach ($formalVocabulary['properties'] as $formalProperty) {
                $property = new ItemRelationsProperty;
                $property->vocabulary_id = $vocabularyId;
                $property->local_part = $formalProperty['local_part'];
                $property->label = $formalProperty['label'];
                $property->description = $formalProperty['description'];
                $property->save();
                
              
            }
        
            die("couldn't save vocab");
        
        }
    }

}
$prlRelations = new PRLRelations();
$prlRelations->setUp();


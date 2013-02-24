<?php
/**
 * Template borrowed from the ItemsRelations plugin
 */
return $formalVocabularies = array(
    array(
        'name' => 'PRL', 
        'description' => 'ontology to use until we discover more appropriate standards', 
        'namespace_prefix' => 'prl', 
        'namespace_uri' => 'http://literati.cct.lsu.edu/prl', 
        'properties' => array(
            array(
                'local_part' => 'isRepresentativeDepictionOf', 
                'label' => 'Representative Depiction', 
                'description' => '[image] is representative of [concept | item | tale | event]'
            ),
            array(
                'local_part' => 'isSignificantElementOf', 
                'label' => 'is Significant Element of', 
                'description' => '[Event | Place] is Significant Element of [Tale | Letter | Concept]'
            ),

        )
    ), 
     
);

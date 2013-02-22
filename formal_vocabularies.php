<?php
/**
 * Template borrowed from the ItemsRelations plugin
 */
return $formalVocabularies = array(
    array(
        'name' => 'PRL1', 
        'description' => 'PRL Dynamic, Expanding Organic Vocabulary, first iteration', 
        'namespace_prefix' => 'prl1', 
        'namespace_uri' => 'http://literati.cct.lsu.edu/prl1', 
        'properties' => array(
            array(
                'local_part' => 'exemplifiesConcept', 
                'label' => 'Exemplifies Concept', 
                'description' => 'This Exemplifies one of the main PRL Concepts (eg Jingoism, American Exceptionalism)'
            ), 
            array(
                'local_part' => 'characterOfTale', 
                'label' => 'Character Belongs to Tale', 
                'description' => 'for characters, this links them with their story.'
            ),
            array(
                'local_part' => 'elementOfTale', 
                'label' => 'Element of Tale', 
                'description' => "non-character element of a story; Brandreth's Pills, for example"
            ), 
            array(
                'local_part' => 'settingOfTale', 
                'label' => 'Setting of Tale', 
                'description' => 'this item appears as a setting of the tale'
            ), 
            array(
                'local_part' => 'referencedHistoricEvent', 
                'label' => 'Referenced Historic Event', 
                'description' => 'an historic event referenced directly or by allusion in tale'
            ), 
            array(
                'local_part' => 'eventReportage', 
                'label' => 'Reportage of Historic Event', 
                'description' => 'Newspaper article, cartoon, photo, etc that constitutes historical reportage of a significant historic event.'
            ), 
            array(
                'local_part' => 'settingOfEvent', 
                'label' => 'Setting of historic event', 
                'description' => 'this points from an event in history to its setting'
            ),
            array(
                'local_part' => 'representativeDepictionOf', 
                'label' => 'Representative Depiction', 
                'description' => 'This image is representative of some concept, item, tale, event. 
                    This helps identify imagery to use as a cover image.'
            ), 

        )
    ), 
     
);

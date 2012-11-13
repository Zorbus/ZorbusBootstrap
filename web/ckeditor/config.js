/**
 * Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.skin = 'moono';
    config.toolbar = 'zorbus';

    config.toolbar_zorbus =
    [
    {
        name: 'document',
        items : [ 'Source','-','DocProps','Preview','Print','-','Templates' ]
    },
{
        name: 'clipboard',
        items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ]
    },
{
        name: 'editing',
        items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ]
    },
    '/',
    {
        name: 'basicstyles',
        items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ]
    },
{
        name: 'paragraph',
        items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
        '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ]
    },
{
        name: 'links',
        items : [ 'Link','Unlink','Anchor' ]
    },
{
        name: 'insert',
        items : [ 'Image','Flash','Table','HorizontalRule','SpecialChar','PageBreak' ]
    },
    '/',
    {
        name: 'styles',
        items : [ 'Styles','Format','Font','FontSize' ]
    },
{
        name: 'colors',
        items : [ 'TextColor','BGColor' ]
    },
{
        name: 'tools',
        items : [ 'Maximize', 'ShowBlocks', ]
    }
    ];
};
CKEDITOR.on( 'dialogDefinition', function( ev )
{
    // Take the dialog name and its definition from the event data.
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    // Check if the definition is from the dialog we're
    // interested on (the Link dialog).
    if ( dialogName == 'link' )
    {
        // FCKConfig.LinkDlgHideAdvanced = true
        //dialogDefinition.removeContents( 'advanced' );

        // FCKConfig.LinkDlgHideTarget = true
        //dialogDefinition.removeContents( 'target' );
        dialogDefinition.removeContents( 'Upload' );
    }

    if ( dialogName == 'image' )
    {
        // FCKConfig.ImageDlgHideAdvanced = true
        //dialogDefinition.removeContents( 'advanced' );
        // FCKConfig.ImageDlgHideLink = true
        //dialogDefinition.removeContents( 'Link' );
        dialogDefinition.removeContents( 'Upload' );
    }

    if ( dialogName == 'flash' )
    {
        // FCKConfig.FlashDlgHideAdvanced = true
        //dialogDefinition.removeContents( 'advanced' );
        dialogDefinition.removeContents( 'Upload' );
    }

});

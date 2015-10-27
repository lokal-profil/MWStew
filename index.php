<?php
require_once "bootstrap.php";

// OOUI
OOUI\Theme::setSingleton( new OOUI\MediaWikiTheme() );
OOUI\Element::setDefaultDir( 'ltr' );
$styles = array(
	'includes/styles/ooui/oojs-ui-mediawiki.css',
	'includes/styles/MWStew.css'
);
?>
<html>
	<head>
	<title>MWStew: MediaWiki Extension Boilerplate Maker</title>
<?php
	// Stylesheets
	for ( $i = 0; $i < count( $styles ); $i++ ) {
		echo '<link rel="stylesheet" href="' . $styles[$i] . '">'."\n";
	}
?>
	</head>
<body>
	<div class="wrapper">
<?php
	// Title
	$title = new OOUI\LabelWidget( array(
		"label" => "MWStew",
		"classes" => array( "mwstew-ui-title-main" )
	) );
	$subtitle = new OOUI\LabelWidget( array(
		"label" => "MediaWiki Extension Boilerplate Maker",
		"classes" => array( "mwstew-ui-title-subtitle" )
	) );

	// Form
	$form = new OOUI\FormLayout( array(
		"method" => "post",
		"action" => "download.php",
		"classes" => array( 'mwstew-ui-form' )
	) );

	// Submit button
	$submitFieldsetLayout = new OOUI\FieldsetLayout( array(
		"classes" => array( 'mwstew-ui-form-fieldsets-submit' ),
		"items" => array(
			new OOUI\ButtonInputWidget( array(
				"label" => "Create boilerplate",
				"classes" => array( 'mwstew-ui-form-fieldsets-submit-button' ),
				"type" => "submit",
				"flags" => array( 'constructive' ),
			) )
		),
	) );

	// Extension details
	$extDetailsFieldsetLayout = new OOUI\FieldsetLayout( array(
		"label" => "General details",
		"classes" => array( 'mwstew-ui-form-fieldsets-general' ),
		"items" => array(
			// Name
			new OOUI\FieldLayout(
				new OOUI\TextInputWidget( array(
					"placeholder" => "MyMWExtension",
					"required" => true,
					"name" => "ext_name",
				) ),
				array(
					"label" => "Extension name",
					// "help" => "Your extension name. Cannot have spaces.",
					"align" => "left",
				)
			),
			// Author
			new OOUI\FieldLayout(
				new OOUI\TextInputWidget( array(
					"placeholder" => "Your name",
					"required" => true,
					"name" => "ext_author",
				) ),
				array(
					"label" => "Extension author",
					// "help" => "Tell us who the author is. This will be public; you can use your real name or the username people know you by.",
					"align" => "left",
				)
			),
			// Version
			new OOUI\FieldLayout(
				new OOUI\TextInputWidget( array(
					"placeholder" => "0.0.0",
					"name" => "ext_version",
				) ),
				array(
					"label" => "Extension version",
					// "help" => "The version of this extension. Defaults to 0.0.0"
					"align" => "left",
				)
			),
			// Description
			new OOUI\FieldLayout(
				new OOUI\TextInputWidget( array(
					"placeholder" => "Description",
					"multiline" => true,
					"rows" => 3,
					"name" => "ext_description",
				) ),
				array(
					"label" => "Extension description",
					// "help" => "Describe what your extension does."
					"align" => "left",
				)
			),
			// URL
			new OOUI\FieldLayout(
				new OOUI\TextInputWidget( array(
					"placeholder" => "https://www.mediawiki.org/wiki/Extension:YourExtension",
					"name" => "ext_url",
				) ),
				array(
					"label" => "Extension URL",
					// "help" => "A URL for the extension details.",
					"align" => "left",
				)
			),
			// License
			new OOUI\FieldLayout(
				new OOUI\RadioSelectInputWidget( array(
					// "placeholder" => "Your extension license",
					"required" => true,
					"name" => "ext_license",
					"options" => array(
						array( "data" => "MIT License", "label" => "MIT License" ),
						array( "data" => "GPLv2 License", "label" => "GPLv2 License" ),
					)
				) ),
				array(
					"label" => "Extension license",
					// "help" => "Choose an extension license. MIT License is prefered; all extensions should be open source license.",
					"align" => "left",
				)
			),
		),
	) );
	// Extension development details
	$extDevelopmentFieldsetLayout = new OOUI\FieldsetLayout( array(
		"label" => "Development environment",
		"classes" => array( 'mwstew-ui-form-fieldset-development' ),
		"items" => array(
			// PHP Development
			new OOUI\FieldLayout(
				new OOUI\CheckboxInputWidget( array(
					"name" => "ext_dev_php",
					"value" => 1,
				) ),
				array(
					"label" => "PHP development tools",
					"align" => "inline",
					"help" => "Select if your extension has PHP pieces, to add PHP development tools.",
				)
			),
			// Javascript Development
			new OOUI\FieldLayout(
				new OOUI\CheckboxInputWidget( array(
					"name" => "ext_dev_js",
					"value" => 1,
				) ),
				array(
					"label" => "JavaScript development tools",
					"align" => "inline",
					"help" => "Select if your extension has JavaScript modules, to add JavaScript development tools.",
				)
			)
		)
	) );

	// Build the form
	$form->addItems( array( $extDetailsFieldsetLayout, $extDevelopmentFieldsetLayout ) );

	$form->addItems( array( $submitFieldsetLayout ) );
?>
	<div class="mwstew-ui-title">
<?php
	echo $title;
	echo $subtitle;
?>
	</div>
<?php
	echo $form;
?>
	</div>
</body>
</html>

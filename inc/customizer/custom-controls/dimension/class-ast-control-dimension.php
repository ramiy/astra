<?php
/**
 * Customizer Control: dimension
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * A text control with validation for CSS units.
 */
class Ast_Control_Dimension extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'ast-dimension';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		$css_uri = AST_THEME_URI . 'inc/customizer/custom-controls/dimension/';
		$js_uri  = AST_THEME_URI . 'inc/customizer/custom-controls/dimension/';

		wp_enqueue_script( 'ast-dimension', $js_uri . 'dimension.js', array( 'jquery', 'customize-base' ), false, true );
		wp_localize_script( 'ast-dimension', 'astL10n', $this->l10n() );
		wp_enqueue_style( 'ast-dimension-css', $css_uri . 'dimension.css', null );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value']    = $this->value();
		$this->json['choices']  = $this->choices;
		$this->json['link']     = $this->get_link();
		$this->json['id']       = $this->id;
		$this->json['l10n']     = $this->l10n();
		$this->json['label']    = esc_html( $this->label );

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<label class="customizer-text">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<div class="input-wrapper">
				<input {{{ data.inputAttrs }}} type="number" value="{{ data.value }}"/>
			</div>
		</label>
		<?php
	}

	/**
	 * Returns an array of translation strings.
	 *
	 * @access protected
	 * @since 1.0.0
	 * @param string|false $id The string-ID.
	 * @return string
	 */
	protected function l10n( $id = false ) {
		$translation_strings = array(
			'invalid-value' => esc_attr__( 'Invalid Value', 'astra' ),
		);
		return $translation_strings;
	}
}

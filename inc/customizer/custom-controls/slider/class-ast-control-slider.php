<?php
/**
 * Customizer Control: slider.
 *
 * Creates a jQuery slider control.
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
 * Slider control (range).
 */
class Ast_Control_Slider extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'ast-slider';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $suffix = '';

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
		$this->json['value']  = $this->value();
		$this->json['link']   = $this->get_link();
		$this->json['id']     = $this->id;
		$this->json['label']  = esc_html( $this->label );
		$this->json['suffix'] = $this->suffix;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}
	}

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		$css_uri = AST_THEME_URI . '/inc/customizer/custom-controls/slider/';
		$js_uri  = AST_THEME_URI . '/inc/customizer/custom-controls/slider/';

		wp_enqueue_script( 'ast-slider', $js_uri . 'slider.js', array( 'jquery', 'customize-base' ), false, true );
		wp_enqueue_style( 'ast-slider', $css_uri . 'slider.css', null );
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
		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<div class="wrapper">
				<input {{{ data.inputAttrs }}} type="range" value="{{ data.value }}" {{{ data.link }}} data-reset_value="{{ data.default }}" />
				<div class="ast_range_value">
					<input type="number" class="value ast-range-value-input" value="{{ data.value }}" {{{ data.inputAttrs }}} ><# 
					if ( data.suffix ) { 

					#><span class="ast-range-unit">{{ data.suffix }}</span><# 
					} #>
				</div>
				<div class="ast-slider-reset">
					<span class="dashicons dashicons-image-rotate"></span>
				</div>
			</div>
		</label>
		<?php
	}
}

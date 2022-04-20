<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class VABFWC_Class_Adm extends VABFWC_Class {
	function ShoW() {
		$ret = '';
		if ( file_exists( $this->mIP )
				&& file_exists( $this->mDATE )
				&& file_exists( $this->mAGENT )
				&& is_user_logged_in()
				&& !empty( get_userdata( get_current_user_id() ) )
				&& in_array( 'administrator', get_userdata( get_current_user_id() )->roles, true ) ) {
			$massiveDate					= file( $this->mDATE );
			$massiveIP						= file( $this->mIP );
			$massiveAgent					= file( $this->mAGENT );
			$countTR							= count( $massiveDate );
			$echoTR								= "";
			$kses_link_Arg				= 	array( /* wp_kses */
				'a'									=>	array(
					'href'						=>	array(),
					'target'					=>	array(),
				),
			);
			for( $tr = 0; $tr < $countTR; $tr++ ) {
				$b = $tr + 1;
				$echoTR .=	'<tr>
											<td>' . esc_html( $b ) . '</td>
											<td>' . esc_html( $massiveIP[$tr] ) . '</td>
											<td>' . esc_html( $massiveDate[$tr] ) . '</td>
											<td>' . esc_html( $massiveAgent[$tr] ) . '</td>
										</tr>';
			}
			$SRC	= VABFWC_UPLOAD_URL . '/VABFWC/' . sanitize_title( stristr( VABFWCGSU, '://' ) ) . '/Diagram/' . $this->PostID;
			$ALF	= '&nbsp;&nbsp;&nbsp;<a target="_blank" href="';
			$LF		= esc_html__( 'Open', 'VABFWC' );
			$ret .=	'<div class="spoiler-wrap">
								<div class="spoiler-head folded" tabindex="0">' . esc_html__('Information for administrator', 'VABFWC') . '</div>
									<div class="spoiler-body">
										<table>
											<thead>
												<label for="resTable" style="color:inherit;cursor:pointer;">
													<input id="resTable" style="width:30px;" type="checkbox" name="resTable" value="' . esc_attr__( 'Reset table', 'VABFWC' ) . '"/>' .
														esc_html__( 'Reset table', 'VABFWC') .
												'</label>
												<input style="color:inherit;cursor:pointer;" type="submit" name="ressubmit" value="' . esc_attr__( 'Send', 'VABFWC' ) . '" onclick="' . esc_js( 'return confirm("' . esc_html__( 'Are you sure?', 'VABFWC' ) . '")' ) . '">
											</thead>
											<tfoot>'.
												wp_kses( $ALF . esc_url( $SRC . '/mIP.txt' ) . '">' . esc_html( $LF ) . ' mIP.txt</a>', $kses_link_Arg ) .
												wp_kses( $ALF . esc_url( $SRC . '/mDATE.txt' ) . '">' . esc_html( $LF ) . ' mDATE.txt</a>', $kses_link_Arg ) .
												wp_kses( $ALF . esc_url( $SRC . '/mAGENT.txt' ) . '">' . esc_html( $LF ) . ' mAGENT.txt</a>', $kses_link_Arg ) . '
											</tfoot>
											<tbody>
												<tr>
													<th>№</th>
													<th>' . esc_html__( 'IP - adress', 'VABFWC' ) . '</th>
													<th>' . esc_html__( 'Date', 'VABFWC' ) . '</th>
													<th>' . esc_html__( 'OS and browser', 'VABFWC' ) . '</th>
												</tr>';
			$ret.=					wp_kses_post( $echoTR ) . '
										</tbody>
									</table>
								</div>
							</div>';
		}
		return $ret;
	}
}/*<?php $VABFWC=new VABFWC_Class_Adm();$VABFWC->ShoW();?>*/
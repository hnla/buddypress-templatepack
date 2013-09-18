<?php
/**
 * Member messages
 *
 * @package BuddyPress
 * @subpackage Templatepack
 */
?>

<?php
switch ( bp_current_action() ) :

	// Inbox/Sentbox
	case 'inbox'   :
	case 'sentbox' :
	case 'view'    :
 ?>

		
			<?php bp_get_template_part( 'members/single/messages/messages-loop' ); ?>
		
			<?php switch ( bp_current_action() ) :
				
				// View full message
				case 'view' :				
					
					do_action( 'bp_before_member_messages_content' );
					
					bp_get_template_part( 'members/single/messages/single' );
					
					do_action( 'bp_after_member_messages_content' );
					
				break;
			
			// Compose new mesage or reply to
			case 'compose' :
				
				bp_get_template_part( 'members/single/messages/compose' );
			
			break;				
			
			default:
			
				bp_get_template_part( 'members/single/messages/compose' );
			
			break;
			endswitch;	
		 
			
		
		break;

	// Sitewide Notices
	case 'notices' :
		do_action( 'bp_before_member_messages_content' ); ?>

		<div class="messages" role="main">
			<?php bp_get_template_part( 'members/single/messages/notices-loop' );; ?>
		</div><!-- .messages -->

		<?php do_action( 'bp_after_member_messages_content' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;

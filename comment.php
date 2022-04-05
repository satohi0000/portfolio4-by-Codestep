
<div class="comments">
	<?php if( have_comments() ): //コメントがあったらコメントリストを表示する ?>
	<h3>コメント</h3>
	<ol class="commets-list">
		<!-- //コメントリストを読み込む -->
		<?php wp_list_comments( 'avatar_size=80' ); ?>
	</ol>
	<?php endif; ?>
	<!-- //コメントフォームを読み込む -->
	<?php $args = array(
		'title_reply' => 'コメントする',
		'comment_notes_before' => '<p>コメント記入欄の上に表示するメッセージ</p>',
		'comment_notes_after'  => '<p>コメント記入欄の下に表示するメッセージ</p>',
		'label_submit' => 'SUBMIT'
	);
	comment_form( $args ); ?>
</div>
<?php paginate_comments_links(); ?>
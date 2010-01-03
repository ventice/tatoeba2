<?php
/*
    Tatoeba Project, free collaborative creation of multilingual corpuses project
    Copyright (C) 2009  HO Ngoc Phuong Trang <tranglich@gmail.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

$lang = 'eng';
if (isset($this->params['lang'])) {
	Configure::write('Config.language',  $this->params['lang']);
	$lang = $this->params['lang'];
}

$langArray = $languages->languagesArray();
$selectedLanguage = $session->read('random_lang_selected');

if ($selectedLanguage == null ){
    $selectedLanguage == 'und' ;
}
//array_unshift($langArray, array('any' => __('any', true)));
?>

<h2>
	<?php __('Random sentence'); ?> 
	<span class="annexe">
		(<?php echo '<a id="showRandom" lang="'.$lang.'" >' . __('show another ', true) . '</a> ';?>
			<?php echo $form->select("randomLangChoice", $langArray, $selectedLanguage, null, false); ?>)
	</span>
	<?php
	if($session->read('Auth.User.id')){
		?>
		<span class="annexe">
			(<?php echo $html->link(__('show more...', true)
				, array(
					"controller" => "sentences",
					"action" => "several_random_sentences"));?>)
		</span>
		<?php
	}
	?>
</h2>

<div class="random_sentences_set"></div>

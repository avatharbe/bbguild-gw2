<?php
/**
 * GW2 Installer
 *
 * Installs Guild Wars 2 factions, professions, races, and roles.
 * GW2 uses Damage/Support/Control roles instead of the standard holy trinity.
 *
 * @package   bbguildgw2 v2.0
 * @copyright 2018 avathar.be
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace avathar\bbguildgw2\game;

use avathar\bbguild\model\games\abstract_game_install;

/**
 * Class gw2_installer
 *
 * @package avathar\bbguildgw2\game
 */
class gw2_installer extends abstract_game_install
{
	/**
	 * Installs GW2 factions
	 */
	protected function install_factions()
	{

		$this->db->sql_query('DELETE FROM ' . $this->table('bb_factions_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "'");
		$sql_ary = array();
		$sql_ary[] = array('game_id' => $this->game_id, 'faction_id' => 1, 'faction_name' => 'Tyria');
		$sql_ary[] = array('game_id' => $this->game_id, 'faction_id' => 2, 'faction_name' => 'Zaithan');
		$this->db->sql_multi_insert($this->table('bb_factions_table'), $sql_ary);
	}

	/**
	 * Installs GW2 professions with translations (en, fr, de, it)
	 */
	protected function install_classes()
	{

		$this->db->sql_query('DELETE FROM ' . $this->table('bb_classes_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "'");
		$sql_ary = array();
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 0, 'class_faction_id' => 1, 'class_armor_type' => 'CLOTH',   'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#A9ABA0', 'imagename' => 'gw2_unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 1, 'class_faction_id' => 1, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#FFE8B3', 'imagename' => 'gw2_warrior');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 2, 'class_faction_id' => 1, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#B9E0EC', 'imagename' => 'gw2_guardian');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 3, 'class_faction_id' => 1, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#E8BC84', 'imagename' => 'gw2_engineer');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 4, 'class_faction_id' => 1, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#C7EFA2', 'imagename' => 'gw2_ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 5, 'class_faction_id' => 1, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#DEC6C9', 'imagename' => 'gw2_thief');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 6, 'class_faction_id' => 1, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#FBC5C3', 'imagename' => 'gw2_elementalist');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 7, 'class_faction_id' => 1, 'class_armor_type' => 'ROBE',    'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#C595DD', 'imagename' => 'gw2_mesmer');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 8, 'class_faction_id' => 1, 'class_armor_type' => 'ROBE',    'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#73B78A', 'imagename' => 'gw2_necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 9, 'class_faction_id' => 1, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 80, 'colorcode' => '#B1574C', 'imagename' => 'gw2_revenant');
		$this->db->sql_multi_insert($this->table('bb_classes_table'), $sql_ary);
		unset($sql_ary);

		// Class names in multiple languages
		$this->db->sql_query('DELETE FROM ' . $this->table('bb_language_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "' AND attribute = 'class'");
		$sql_ary = array();

		// en
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'en', 'attribute' => 'class', 'name' => 'Unknown',       'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'en', 'attribute' => 'class', 'name' => 'Warrior',       'name_short' => 'Warrior');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'en', 'attribute' => 'class', 'name' => 'Guardian',      'name_short' => 'Guardian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3, 'language' => 'en', 'attribute' => 'class', 'name' => 'Engineer',      'name_short' => 'Engineer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4, 'language' => 'en', 'attribute' => 'class', 'name' => 'Ranger',        'name_short' => 'Ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5, 'language' => 'en', 'attribute' => 'class', 'name' => 'Thief',         'name_short' => 'Thief');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6, 'language' => 'en', 'attribute' => 'class', 'name' => 'Elementalist',  'name_short' => 'Elementalist');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7, 'language' => 'en', 'attribute' => 'class', 'name' => 'Mesmer',        'name_short' => 'Mesmer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8, 'language' => 'en', 'attribute' => 'class', 'name' => 'Necromancer',   'name_short' => 'Necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9, 'language' => 'en', 'attribute' => 'class', 'name' => 'Revenant',      'name_short' => 'Revenant');

		// fr
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Inconnu',         'name_short' => 'Inconnu');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Guerrier',        'name_short' => 'Guerrier');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Gardien',         'name_short' => 'Guardien');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Ingénieur',       'name_short' => 'Ingénieur');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Rôdeur',          'name_short' => 'Rôdeur');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Voleur',          'name_short' => 'Voleur');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Élémentaliste',   'name_short' => 'Élémentaliste');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Envoûteur',       'name_short' => 'Envoûteur');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Nécromant',       'name_short' => 'Nécromant');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Revenant',        'name_short' => 'Revenant');

		// de
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'de', 'attribute' => 'class', 'name' => 'Unknown',       'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'de', 'attribute' => 'class', 'name' => 'Warrior',       'name_short' => 'Warrior');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'de', 'attribute' => 'class', 'name' => 'Guardian',      'name_short' => 'Guardian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3, 'language' => 'de', 'attribute' => 'class', 'name' => 'Engineer',      'name_short' => 'Engineer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4, 'language' => 'de', 'attribute' => 'class', 'name' => 'Ranger',        'name_short' => 'Ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5, 'language' => 'de', 'attribute' => 'class', 'name' => 'Thief',         'name_short' => 'Thief');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6, 'language' => 'de', 'attribute' => 'class', 'name' => 'Elementalist',  'name_short' => 'Elementalist');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7, 'language' => 'de', 'attribute' => 'class', 'name' => 'Mesmer',        'name_short' => 'Mesmer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8, 'language' => 'de', 'attribute' => 'class', 'name' => 'Necromancer',   'name_short' => 'Necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9, 'language' => 'de', 'attribute' => 'class', 'name' => 'Revenant',      'name_short' => 'Revenant');

		// it
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'it', 'attribute' => 'class', 'name' => 'Sconosciuto',   'name_short' => 'Sconosciuto');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'it', 'attribute' => 'class', 'name' => 'Guerriero',     'name_short' => 'Guerriero');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'it', 'attribute' => 'class', 'name' => 'Guardiano',     'name_short' => 'Guardiano');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3, 'language' => 'it', 'attribute' => 'class', 'name' => 'Ingegnere',     'name_short' => 'Ingegnere');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4, 'language' => 'it', 'attribute' => 'class', 'name' => 'Ranger',        'name_short' => 'Ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5, 'language' => 'it', 'attribute' => 'class', 'name' => 'Thief',         'name_short' => 'Thief');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6, 'language' => 'it', 'attribute' => 'class', 'name' => 'Elementalist',  'name_short' => 'Elementalist');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7, 'language' => 'it', 'attribute' => 'class', 'name' => 'Mesmer',        'name_short' => 'Mesmer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8, 'language' => 'it', 'attribute' => 'class', 'name' => 'Necromancer',   'name_short' => 'Necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9, 'language' => 'it', 'attribute' => 'class', 'name' => 'Revenant',      'name_short' => 'Revenant');

		$this->db->sql_multi_insert($this->table('bb_language_table'), $sql_ary);
	}

	/**
	 * Installs GW2 races with translations (en, fr, de, it)
	 */
	protected function install_races()
	{

		$this->db->sql_query('DELETE FROM ' . $this->table('bb_races_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "'");
		$sql_ary = array();
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 0, 'race_faction_id' => 1, 'image_female' => 'gw2_unknown', 'image_male' => 'gw2_unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 1, 'race_faction_id' => 1, 'image_female' => 'gw2_sylvari', 'image_male' => 'gw2_sylvari');
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 2, 'race_faction_id' => 1, 'image_female' => 'gw2_norn',    'image_male' => 'gw2_norn');
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 3, 'race_faction_id' => 1, 'image_female' => 'gw2_charr',   'image_male' => 'gw2_charr');
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 4, 'race_faction_id' => 1, 'image_female' => 'gw2_asura',   'image_male' => 'gw2_asura');
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 5, 'race_faction_id' => 1, 'image_female' => 'gw2_human',   'image_male' => 'gw2_human');
		$this->db->sql_multi_insert($this->table('bb_races_table'), $sql_ary);
		unset($sql_ary);

		// Race names
		$this->db->sql_query('DELETE FROM ' . $this->table('bb_language_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "' AND attribute = 'race'");
		$sql_ary = array();

		// en
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'en', 'attribute' => 'race', 'name' => 'Unknown',  'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'en', 'attribute' => 'race', 'name' => 'Sylvari',  'name_short' => 'Sylvari');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'en', 'attribute' => 'race', 'name' => 'Norn',     'name_short' => 'Norn');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3, 'language' => 'en', 'attribute' => 'race', 'name' => 'Charr',    'name_short' => 'Charr');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4, 'language' => 'en', 'attribute' => 'race', 'name' => 'Asura',    'name_short' => 'Asura');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5, 'language' => 'en', 'attribute' => 'race', 'name' => 'Human',    'name_short' => 'Human');

		// fr
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Inconnu',  'name_short' => 'Inconnu');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Sylvari',  'name_short' => 'Sylvari');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Norn',     'name_short' => 'Norn');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Charr',    'name_short' => 'Charr');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Asura',    'name_short' => 'Asura');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Humain',   'name_short' => 'Humain');

		// de
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'de', 'attribute' => 'race', 'name' => 'Unbekannt', 'name_short' => 'Unbekannt');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'de', 'attribute' => 'race', 'name' => 'Sylvari',   'name_short' => 'Sylvari');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'de', 'attribute' => 'race', 'name' => 'Norn',      'name_short' => 'Norn');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3, 'language' => 'de', 'attribute' => 'race', 'name' => 'Charr',     'name_short' => 'Charr');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4, 'language' => 'de', 'attribute' => 'race', 'name' => 'Asura',     'name_short' => 'Asura');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5, 'language' => 'de', 'attribute' => 'race', 'name' => 'Mensch',    'name_short' => 'Mensch');

		// it
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'it', 'attribute' => 'race', 'name' => 'Sconosciuto', 'name_short' => 'Sconosciuto');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'it', 'attribute' => 'race', 'name' => 'Sylvari',     'name_short' => 'Sylvari');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'it', 'attribute' => 'race', 'name' => 'Norn',        'name_short' => 'Norn');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3, 'language' => 'it', 'attribute' => 'race', 'name' => 'Charr',       'name_short' => 'Charr');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4, 'language' => 'it', 'attribute' => 'race', 'name' => 'Asura',       'name_short' => 'Asura');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5, 'language' => 'it', 'attribute' => 'race', 'name' => 'Umani',       'name_short' => 'Umani');

		$this->db->sql_multi_insert($this->table('bb_language_table'), $sql_ary);
	}

	/**
	 * Installs GW2 game roles.
	 * GW2 uses Damage/Support/Control instead of the standard holy trinity.
	 */
	protected function install_roles()
	{

		$this->db->sql_query('DELETE FROM ' . $this->table('bb_gameroles_table') . " WHERE role_id < 3 AND game_id = '" . $this->db->sql_escape($this->game_id) . "'");
		$this->db->sql_query('DELETE FROM ' . $this->table('bb_language_table') . " WHERE attribute_id < 3 AND attribute = 'role' AND game_id = '" . $this->db->sql_escape($this->game_id) . "'");

		$sql_ary = array(
			array('game_id' => $this->game_id, 'role_id' => 0, 'role_color' => '#FF4455', 'role_icon' => 'dps_icon'),
			array('game_id' => $this->game_id, 'role_id' => 1, 'role_color' => '#11FF77', 'role_icon' => 'healer_icon'),
			array('game_id' => $this->game_id, 'role_id' => 2, 'role_color' => '#c3834c', 'role_icon' => 'tank_icon'),
		);
		$this->db->sql_multi_insert($this->table('bb_gameroles_table'), $sql_ary);

		$sql_ary = array(
			// en
			array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'en', 'attribute' => 'role', 'name' => 'Damage',   'name_short' => 'DPS'),
			array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'en', 'attribute' => 'role', 'name' => 'Support',   'name_short' => 'Sup'),
			array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'en', 'attribute' => 'role', 'name' => 'Control',   'name_short' => 'Con'),
			// fr
			array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'fr', 'attribute' => 'role', 'name' => 'Dégats',    'name_short' => 'DPS'),
			array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'fr', 'attribute' => 'role', 'name' => 'Support',    'name_short' => 'Sup'),
			array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'fr', 'attribute' => 'role', 'name' => 'Contrôle',   'name_short' => 'Con'),
			// de
			array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'de', 'attribute' => 'role', 'name' => 'Kämpfer',    'name_short' => 'Schaden'),
			array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'de', 'attribute' => 'role', 'name' => 'Stütz',      'name_short' => 'Stütz'),
			array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'de', 'attribute' => 'role', 'name' => 'Kontrolle',   'name_short' => 'Kontrolle'),
			// it
			array('game_id' => $this->game_id, 'attribute_id' => 0, 'language' => 'it', 'attribute' => 'role', 'name' => 'Danni',      'name_short' => 'Danni'),
			array('game_id' => $this->game_id, 'attribute_id' => 1, 'language' => 'it', 'attribute' => 'role', 'name' => 'Supporto',    'name_short' => 'Supporto'),
			array('game_id' => $this->game_id, 'attribute_id' => 2, 'language' => 'it', 'attribute' => 'role', 'name' => 'Controllo',   'name_short' => 'Controllo'),
		);
		$this->db->sql_multi_insert($this->table('bb_language_table'), $sql_ary);
	}
}

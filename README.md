# bbGuild - Guild Wars 2
[![Tests](https://github.com/avatharbe/bbguild_gw2/actions/workflows/tests.yml/badge.svg)](https://github.com/avatharbe/bbguild_gw2/actions/workflows/tests.yml)

Game plugin that adds Guild Wars 2 support to [bbGuild](https://github.com/avandenberghe/bbguild).

## Features

- **GW2 Professions** - 10 professions (Warrior, Guardian, Engineer, Ranger, Thief, Elementalist, Mesmer, Necromancer, Revenant) with color codes
- **GW2 Races** - 5 playable races (Sylvari, Norn, Charr, Asura, Human)
- **Factions** - Tyria and Zaithan
- **Custom Roles** - GW2 uses Damage/Support/Control instead of the standard holy trinity (Tank/Healer/DPS)
- **Localization** - Profession, race, and role names in English, French, German, and Italian
- **Guild Emblems** - Includes GW2 API emblem assets (1459 images)

## Requirements

- phpBB >= 3.3.0
- PHP >= 7.4.0
- **bbGuild core** (`avathar/bbguild`) must be installed and enabled

## Installation

1. Ensure bbGuild core (`avathar/bbguild`) is installed and enabled.
2. Copy the `bbguild_gw2` folder to `/ext/avathar/bbguild_gw2/`.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `bbGuild - Guild Wars 2` under Disabled Extensions and click `Enable`.
5. Go to ACP > bbGuild > Games and install the **Guild Wars 2** game.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Find `bbGuild - Guild Wars 2` under Enabled Extensions and click `Disable`.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/avathar/bbguild_gw2` folder.

**Note:** Disabling the extension does not delete existing guild or player data. Your roster and player records remain intact in bbGuild core.

## Game Data

### Factions

| ID | Faction |
|----|---------|
| 1 | Tyria |
| 2 | Zaithan |

### Professions (10)

| ID | Profession | Armor |
|----|------------|-------|
| 0 | Unknown | Cloth |
| 1 | Warrior | Plate |
| 2 | Guardian | Plate |
| 3 | Engineer | Mail |
| 4 | Ranger | Leather |
| 5 | Thief | Leather |
| 6 | Elementalist | Mail |
| 7 | Mesmer | Robe |
| 8 | Necromancer | Robe |
| 9 | Revenant | Plate |

### Races (5)

Sylvari, Norn, Charr, Asura, Human

### Roles

GW2 overrides the default Tank/Healer/DPS roles:

| ID | Role |
|----|------|
| 0 | Damage |
| 1 | Support |
| 2 | Control |

## License

[GNU General Public License v2](http://opensource.org/licenses/gpl-2.0.php)

## Links

- [bbGuild Core](https://github.com/avandenberghe/bbguild)
- [Issue Tracker](https://github.com/avandenberghe/bbguild/issues)

# Dokan scrapping

A simple program written in **PHP** and **JS** (wisth the help of JQUERY) to retrieve cards informations from the game **DOKKAN BATTLE** (https://dbz-dokkan.bngames.net/fr/).


# Result

Here is a sample of the result file that you will find in **RESULT/result.json**. (The project contain an already generated result.json up to date to the **18/10/2021**).

```
{
    "id": 1008801,
    "name": "Androids #17 & #18",
    "rarity": "LR",
    "class": "Extreme",
    "type": "AGL",
    "categories": [
        "Androids",
        "Androids/Cell Saga",
        "Joined Forces",
        "Siblings' Bond",
        "Target: Goku"
    ],
    "links": [
        "Fear and Faith [Ki +2]",
        "Infinite Energy [Ki +2]",
        "Legendary Power [ATK +10% when performing a Super Attack]",
        "Nightmare [ATK +10%]",
        "Shocking Speed [Ki +2]",
        "The Innocents [ATK +10%]",
        "Twin Terrors [Ki +2]"
    ],
    "img": "https://i.imgur.com/8Wp6Fdi.png",
    "subtitle": "Limitless Energy",
    "cost": "99",
    "leader": "All Types Ki +4",
    "super": "Non-stop Violence - Causes mega-colossal damage to enemy and lowers ATK &amp; DEF ",
    "passive": "Android's True Power - ATK +15000 when performing a Super Attack",
    "HP": {
        "base": "13200", 
        "max": "17800"
    },
    "ATK": {
        "base": "13100",
        "max": "18100"
    },
    "DEF": {
        "base": "7100",
        "max": "12500"
    }
}
```
- base stat : awoken
- max stat : full dupe orb

. These info are mainly coming from https://dbz.space/ and https://www.dokkanbattleoptimizer.com/
. Note that, at this is webscraping the process will take quite some time

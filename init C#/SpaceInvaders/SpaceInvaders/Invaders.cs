using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SpaceInvaders
{
    class Invaders
    {
        public char Motif { get; set; } = '#';

        public override string ToString()
        {
            return ""+Motif;//on peut pas caster ou parcer un char en string visiblement.. mais on peut le concaténer à une chaine vide.. bon en vrai, on pourait retourner un char mais.. on nous demande un string.
        }
    }
}

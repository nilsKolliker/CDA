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

        public Invaders()
        {
        }
        public Invaders(char motif)
        {
            this.Motif = motif;
        }

        public override string ToString()
        {
            return ""+this.Motif;
        }
    }
}

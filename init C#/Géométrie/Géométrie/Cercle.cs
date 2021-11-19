using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Géométrie
{
    class Cercle
    {
        public double Diametre { get; set; }

        public Cercle()
        {
        }

        public Cercle(double diametre)
        {
            Diametre = diametre;
        }
        public override string ToString()
        {
            return "Diametre : " + this.Diametre + " - Périmètre : " + this.Perimetre() + " - Aire : " + this.Aire();
        }
        public double Perimetre()
        {
            return Math.PI*this.Diametre;
        }
        public double Aire()
        {
            return Math.PI*Math.Pow(this.Diametre,2)/4;
        }
        public void AfficherCercle()
        {
            Console.WriteLine(this);
        }
    }
}

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Géométrie
{
    class Parallelepipede:Rectangle
    {
        public double Hauteur { get; set; }

        public Parallelepipede()
        {
        }

        public Parallelepipede(double hauteur, double longueur, double largeur) :base(longueur, largeur)
        {
            Hauteur = hauteur;
        }

        public override string ToString()
        {
            return "Périmètre : "+this.Perimetre()+" - Volume : "+this.Volume();
        }

        public override double Perimetre()
        {
            return 2 * base.Perimetre() + 4 * this.Hauteur;
        }

        public double Volume()
        {
            return base.Aire() * this.Hauteur;
        }

        public void AfficherParallelepipede()
        {
            Console.WriteLine(this);
        }
    }
}

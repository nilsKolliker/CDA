using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Géométrie
{
    class Pyramide:TriangleRectangle
    {
        public double Profondeur { get; set; }

        public Pyramide()
        {
        }

        public Pyramide(double profondeur, double @base, double hauteur) : base(@base, hauteur)
        {
            Profondeur = profondeur;
        }

        public override string ToString()
        {
            return "Périmètre : " + this.Perimetre() + " - Volume : " + this.Volume();
        }

        public override double Perimetre()
        {
            return 2 * base.Perimetre() + 3 * this.Profondeur;
        }

        public double Volume()
        {
            return base.Aire() * this.Profondeur;
        }

        public void AfficherPyramide()
        {
            Console.WriteLine(this);
        }
    }
}

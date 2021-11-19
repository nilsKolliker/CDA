using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Géométrie
{
    class TriangleRectangle
    {
        public double Base { get; set; }
        public double Hauteur { get; set; }

        public TriangleRectangle()
        {
        }

        public TriangleRectangle(double @base, double hauteur)
        {
            Base = @base;
            Hauteur = hauteur;
        }
        public override string ToString()
        {
            return "Base : " + this.Base + " - Hauteur : " + this.Hauteur + " - Périmètre : " + this.Perimetre() + " - Aire : " + this.Aire();
        }
        public virtual double Perimetre()
        {
            return this.Base + this.Hauteur + Math.Sqrt(Math.Pow(this.Base,2) + Math.Pow(this.Hauteur,2));
        }
        public double Aire()
        {
            return this.Base * this.Hauteur/2;
        }
        public void AfficherTriangle()
        {
            Console.WriteLine(this);
        }
    }
}

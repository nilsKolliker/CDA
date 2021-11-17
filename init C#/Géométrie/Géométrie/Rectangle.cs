using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Géométrie
{
    class Rectangle
    {
        public double Longueur { get; set; }
        public double Largeur { get; set; }

        public Rectangle()
        {
        }
        public Rectangle(double longueur, double largeur)
        {
            Longueur = longueur;
            Largeur = largeur;
        }

        public override string ToString()
        {
            return "Longueur : " + this.Longueur + " - Largeur : " + this.Largeur + " - Périmètre : " + this.Perimetre() + " - Aire : " + this.Aire() + " - " + this.CEstCarre();
        }

        public virtual double Perimetre()
        {
            return 2 * (this.Largeur + this.Longueur);
        }
        public double Aire()
        {
            return this.Largeur * this.Longueur;
        }

        public bool EstCarre()
        {
            return this.Longueur == this.Largeur;
        }

        public string CEstCarre()
        {
            return this.EstCarre() ? "Il s'agit d'un carré" : "Il ne s'agit pas d'un carré";
        }

        public void AfficherRectange()
        {
            Console.WriteLine(this);
        }
    }
}

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Géométrie
{
    class Sphere:Cercle
    {
        public Sphere()
        {
        }

        public Sphere(double diametre) : base(diametre)
        {
        }

        public override string ToString()
        {
            return "Volume : " + this.Volume();
        }

        public double Volume()
        {
            return  base.Diametre * base.Aire()*2/3;
        }

        public void AfficherSphere()
        {
            Console.WriteLine(this);
        }
    }
}

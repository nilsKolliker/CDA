using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Combat
{
    class De
    {
        public static bool Trace { get; set; }
        public int LanceLeDe()
        {
            Random rng = new Random();
            return rng.Next(6) + 1;
        }
    }
}

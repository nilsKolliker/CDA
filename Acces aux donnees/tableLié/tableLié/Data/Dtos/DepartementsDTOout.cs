using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace tableLié.Data.Dtos
{
    public class DepartementsDTOout
    {
        public string Libelle { get; set; }
        public ICollection<VillesDTOout> Ville { get; set; }
    }
}

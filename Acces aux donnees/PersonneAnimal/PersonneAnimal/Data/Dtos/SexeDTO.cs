using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Dtos
{
    public partial class SexeDTOin
    {
        public string Libelle { get; set; }
    }

    public partial class SexeDTOout
    {
        public SexeDTOout()
        {
            Personnes = new HashSet<PersonneDTOavecAnimal>();
        }
        public string Libelle { get; set; }

        public virtual ICollection<PersonneDTOavecAnimal> Personnes { get; set; }
    }
}

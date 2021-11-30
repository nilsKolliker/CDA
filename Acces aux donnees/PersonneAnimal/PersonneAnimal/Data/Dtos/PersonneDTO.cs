using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Dtos
{
    public partial class PersonneDTOin
    {
        public string Nom { get; set; }
        public int IdSexe { get; set; }
    }

    public partial class PersonneDTOout
    {
        //public PersonneDTOout()
        //{
        //    Adoptions = new HashSet<Adoption>();
        //}

        public int IdPersonne { get; set; }
        public string Nom { get; set; }

        public virtual SexeDTOin IdSexeNavigation { get; set; }
        //public virtual ICollection<Adoption> Adoptions { get; set; }
    }

    public partial class PersonneDTOsimple
    {
        public string Nom { get; set; }
    }
}

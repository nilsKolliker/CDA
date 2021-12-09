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
        public PersonneDTOout()
        {
            Adoptions = new HashSet<AdoptionDTOavecAnimal>();
        }

        public string Nom { get; set; }

        public virtual SexeDTOin Sexe { get; set; }
        public virtual ICollection<AdoptionDTOavecAnimal> Adoptions { get; set; }
    }

    public partial class PersonneDTOavecSexe
    {
        public string Nom { get; set; }

        public virtual SexeDTOin Sexe { get; set; }
    }

    public partial class PersonneDTOavecAnimal
    {
        public PersonneDTOavecAnimal()
        {
            Adoptions = new HashSet<AdoptionDTOavecAnimal>();
        }

        public string Nom { get; set; }
        public virtual ICollection<AdoptionDTOavecAnimal> Adoptions { get; set; }
    }



    public partial class PersonneDTOsimple
    {
        public string Nom { get; set; }
    }
}

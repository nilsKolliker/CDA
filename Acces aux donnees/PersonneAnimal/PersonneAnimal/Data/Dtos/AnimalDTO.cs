using System;
using System.Collections.Generic;

#nullable disable

namespace PersonneAnimal.Data.Dtos
{
    public partial class AnimalDTOin
    {
        public string Libelle { get; set; }

    }

    public partial class AnimalDTOout
    {
        public AnimalDTOout()
        {
            Adoptions = new HashSet<AdoptionDTOavecPersonne>();
        }
        public string Libelle { get; set; }

        public virtual ICollection<AdoptionDTOavecPersonne> Adoptions { get; set; }
    }
}

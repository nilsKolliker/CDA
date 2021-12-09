using System;
using System.Collections.Generic;

#nullable disable

namespace PersonneAnimal.Data.Dtos
{
    public partial class AdoptionDTOavecPersonne
    {
        public virtual PersonneDTOavecSexe Personne { get; set; }
    }

    public partial class AdoptionDTOavecAnimal
    {
        public virtual AnimalDTOin Animal { get; set; }
    }
    public partial class AdoptionDTOout
    {
        public virtual AnimalDTOin Animal { get; set; }
        public virtual PersonneDTOavecSexe Personne { get; set; }
    }
    public partial class AdoptionDTOin
    {
        public int? IdPersonne { get; set; }
        public int? IdAnimal { get; set; }
    }
}

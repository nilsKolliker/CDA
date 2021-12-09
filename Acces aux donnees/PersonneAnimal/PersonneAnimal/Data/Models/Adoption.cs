using System;
using System.Collections.Generic;

#nullable disable

namespace PersonneAnimal.Data.Models
{
    public partial class Adoption
    {
        public int IdAdoption { get; set; }
        public int? IdPersonne { get; set; }
        public int? IdAnimal { get; set; }

        public virtual Animal Animal { get; set; }
        public virtual Personne Personne { get; set; }
    }
}

using System;
using System.Collections.Generic;

#nullable disable

namespace PersonneAnimal.Data.Models
{
    public partial class Personne
    {
        public Personne()
        {
            Adoptions = new HashSet<Adoption>();
        }

        public int IdPersonne { get; set; }
        public string Nom { get; set; }
        public int IdSexe { get; set; }

        public virtual Sexe Sexe { get; set; }
        public virtual ICollection<Adoption> Adoptions { get; set; }
    }
}

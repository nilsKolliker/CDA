using System;
using System.Collections.Generic;

#nullable disable

namespace PersonneAnimal.Data.Models
{
    public partial class Animal
    {
        public Animal()
        {
            Adoptions = new HashSet<Adoption>();
        }

        public int IdAnimal { get; set; }
        public string Libelle { get; set; }

        public virtual ICollection<Adoption> Adoptions { get; set; }
    }
}

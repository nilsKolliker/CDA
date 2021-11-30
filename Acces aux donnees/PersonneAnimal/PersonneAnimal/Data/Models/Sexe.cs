using System;
using System.Collections.Generic;

#nullable disable

namespace PersonneAnimal.Data.Models
{
    public partial class Sexe
    {
        public Sexe()
        {
            Personnes = new HashSet<Personne>();
        }

        public int IdSexe { get; set; }
        public string Libelle { get; set; }

        public virtual ICollection<Personne> Personnes { get; set; }
    }
}

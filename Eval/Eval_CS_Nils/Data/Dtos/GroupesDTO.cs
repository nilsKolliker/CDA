using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ECF.Data.Dtos
{
    public class GroupesDTOIn
    {
        public string NomDuGroupe { get; set; }
        public int NombreDeFollowers { get; set; }
        public string Logo { get; set; }
    }

    public class GroupesDTOOut
    {
        public int IdGroupe { get; set; }
        public string NomDuGroupe { get; set; }
        public int NombreDeFollowers { get; set; }
        public string Logo { get; set; }
    }

    public class GroupesDTOOutAvecMusiciens
    {
        public GroupesDTOOutAvecMusiciens()
        {
            ListeMusiciens = new HashSet<MusiciensDTOOut>();
        }

        public int IdGroupe { get; set; }
        public string NomDuGroupe { get; set; }
        public int NombreDeFollowers { get; set; }
        public string Logo { get; set; }

        public virtual ICollection<MusiciensDTOOut> ListeMusiciens { get; set; }
    }
}

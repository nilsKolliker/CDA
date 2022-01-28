using AutoMapper;
using crudTextCsharp.Data.Services;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace crudTextCsharp.Controllers
{
    public class UtilisateursControllers:Controller
    {

        private readonly UtilisateursService _service;
        private readonly IMapper _mapper;

        public UtilisateursControllers(UtilisateursService service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        //GET api/Utilisateurs
        [HttpGet]
        public ActionResult<IEnumerable<UtilisateursDto>> GetAllUtilisateurs()
        {
            IEnumerable<Utilisateur> listeUtilisateurs = _service.GetAllUtilisateurs();
            return Ok(_mapper.Map<IEnumerable<UtilisateursDto>>(listeUtilisateurs));
        }

        //GET api/Utilisateurs/{i}
        [HttpGet("{id}", Name = "GetUtilisateurById")]
        public ActionResult<UtilisateursDto> GetUtilisateurById(int id)
        {
            Utilisateur commandItem = _service.GetUtilisateurById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<UtilisateursDto>(commandItem));
            }
            return NotFound();
        }

        //POST api/Utilisateurs
        [HttpPost]
        public ActionResult<UtilisateursDto> CreateUtilisateur(Utilisateur obj)
        {
            _service.AddUtilisateur(obj);
            return CreatedAtRoute(nameof(GetUtilisateurById), new { Id = obj.Id }, obj);
        }

        //POST api/Utilisateurs/{id}
        [HttpPut("{id}")]
        public ActionResult UpdateUtilisateur(int id, UtilisateursDto obj)
        {
            Utilisateur objFromRepo = _service.GetUtilisateurById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdateUtilisateur(objFromRepo);
            return NoContent();
        }

        // Exemple d'appel
        // [{
        // "op":"replace",
        // "path":"",
        // "value":""
        // }]
        //PATCH api/Utilisateurs/{id}
        [HttpPatch("{id}")]
        public ActionResult PartialUtilisateurUpdate(int id, JsonPatchDocument<Utilisateur> patchDoc)
        {
            Utilisateur objFromRepo = _service.GetUtilisateurById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            Utilisateur objToPatch = _mapper.Map<Utilisateur>(objFromRepo);
            patchDoc.ApplyTo(objToPatch, ModelState);
            if (!TryValidateModel(objToPatch))
            {
                return ValidationProblem(ModelState);
            }
            _mapper.Map(objToPatch, objFromRepo);
            _service.UpdateUtilisateur(objFromRepo);
            return NoContent();
        }

        //DELETE api/Utilisateurs/{id}
        [HttpDelete("{id}")]
        public ActionResult DeleteUtilisateur(int id)
        {
            Utilisateur obj = _service.GetUtilisateurById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeleteUtilisateur(obj);
            return NoContent();
        }


    }
}

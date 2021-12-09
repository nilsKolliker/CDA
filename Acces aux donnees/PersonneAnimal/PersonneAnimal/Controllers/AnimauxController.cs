using AutoMapper;
using Microsoft.AspNetCore.Mvc;
using PersonneAnimal.Data.Dtos;
using PersonneAnimal.Data.Models;
using PersonneAnimal.Data.Services;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class AnimauxController : ControllerBase
    {

        private readonly AnimauxServices _service;
        private readonly IMapper _mapper;

        public AnimauxController(AnimauxServices service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        //GET api/Animaux
        [HttpGet]
        public ActionResult<IEnumerable<AnimalDTOout>> GetAllAnimaux()
        {
            IEnumerable<Animal> listeAnimaux = _service.GetAllAnimaux();
            return Ok(_mapper.Map<IEnumerable<AnimalDTOout>>(listeAnimaux));
        }

        //GET api/Animaux/{i}
        [HttpGet("{id}", Name = "GetAnimauxById")]
        public ActionResult<AnimalDTOout> GetAnimauxById(int id)
        {
            Animal commandItem = _service.GetAnimalById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<AnimalDTOout>(commandItem));
            }
            return NotFound();
        }

        //POST api/Animaux
        [HttpPost]
        public ActionResult<AnimalDTOout> CreateAnimaux(AnimalDTOin obj)
        {
            Animal animal = _mapper.Map<Animal>(obj);
            _service.AddAnimal(animal);
            return CreatedAtRoute(nameof(GetAnimauxById), new { Id = animal.IdAnimal }, animal);
        }

        //POST api/Animaux/{id}
        [HttpPut("{id}")]
        public ActionResult UpdateAnimaux(int id, AnimalDTOin obj)
        {
            Animal objFromRepo = _service.GetAnimalById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdateAnimal(objFromRepo);
            return NoContent();
        }

        // Exemple d'appel
        // [{
        // "op":"replace",
        // "path":"",
        // "value":""
        // }]
        //PATCH api/Animaux/{id}
        //[HttpPatch("{id}")]
        //public ActionResult PartialAnimauxUpdate(int id, JsonPatchDocument<Animaux> patchDoc)
        //{
        //    Animaux objFromRepo = _service.GetAnimauxById(id);
        //    if (objFromRepo == null)
        //    {
        //        return NotFound();
        //    }
        //    Animaux objToPatch = _mapper.Map<Animaux>(objFromRepo);
        //    patchDoc.ApplyTo(objToPatch, ModelState);
        //    if (!TryValidateModel(objToPatch))
        //    {
        //        return ValidationProblem(ModelState);
        //    }
        //    _mapper.Map(objToPatch, objFromRepo);
        //    _service.UpdateAnimaux(objFromRepo);
        //    return NoContent();
        //}

        //DELETE api/Animaux/{id}
        [HttpDelete("{id}")]
        public ActionResult DeleteAnimaux(int id)
        {
            Animal obj = _service.GetAnimalById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeleteAnimal(obj);
            return NoContent();
        }


    }
}
